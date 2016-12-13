<?php

namespace common\modules\courses\modules\tasks\controllers;

use common\models\DiplomaForm;
use common\models\Question;
use common\models\StudAnswer;
use Yii;
use common\models\Task;
use yii\bootstrap\Html;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Default controller for the `tasks` module
 */
class TaskController extends Controller
{
    const SECONDS_PER_QUESTIONS = 60; //false to disable the countdown
    const PAGE_SIZE = 1; // false for all question in one page
    const MINIMUM_SCORE = 70; //false to disable diploma
    const QUESTION_NUMBER = false; // false for all question

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/

        $tasks = Task::find()
            ->select('t.id, t.title, count(*) as questionCount')
            ->from(['t' => Task::tableName()])
            ->innerJoinWith('questions')
            ->groupBy('t.id')
            ->orderBy('t.id ASC')
            ->all();

        return $this->render('index', array('tasks' => $tasks));
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex2()
    {
        return $this->render('index2');
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post())) {
            $model->date_created = date('Y-m-d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function shuffle_assoc($array)
    {
        $keys = array_keys($array);
        shuffle($keys);

        foreach ($keys as $key)
        {
            $new[$key] = $array[$key];
        }
        $array = $new;
        return true;
    }

    public function actionStart()
    {
       $session = Yii::$app->session;
        if(session_id() == '' || !isset($_SESSION))
            session_start();

        if (isset($_GET['task']))
        {
            $session['task'] = $_GET['task'];
        } else {
            $session['task'] = 1;
        }

            unset($session['diplomaGot']);
            unset($session['answers']);

            $answers = array();

            $questions = Question::find()
                ->where(array('task_id' => $session['task']))
                ->all();

            foreach ($questions as $question) {
                $answer = new StudAnswer();
                $answer->question_id = $question->id;
                $answer->title = Html::encode($question->title);
                $answer->user_answer = null;

                $answers_indexs = array(1, 2, 3, 4, 5, 6);
                shuffle($answers_indexs);

                $answers2 = array();
                $answers2[$answers_indexs[0]] = Html::encode($question->answer);
                $answer->answer = $answers_indexs[0];

                if (!is_null($question->answer2))
                    $answers2[$answers_indexs[1]] = Html::encode($question->answer2);
                if (!is_null($question->answer3))
                    $answers2[$answers_indexs[2]] = Html::encode($question->answer3);
                if (!is_null($question->answer4))
                    $answers2[$answers_indexs[3]] = Html::encode($question->answer4);
                if (!is_null($question->answer5))
                    $answers2[$answers_indexs[4]] = Html::encode($question->answer5);
                if (!is_null($question->answer6))
                    $answers2[$answers_indexs[5]] = Html::encode($question->answer6);

                $this->shuffle_assoc($answers2);
                $answer->answers = $answers2;

                $answers[] = $answer;
            }

            $this->shuffle_assoc($answers);
            $i = 0;
            foreach ($answers as $answer) {
                $answer->id = $i;
                $i++;
            }

            $session['answers'] = array_slice($answers, 0, (self::QUESTION_NUMBER ? self::QUESTION_NUMBER : count($answers)));

            $dataProvider = new ArrayDataProvider(array(
                'allModels' => Yii::$app->session['answers'],
                'pagination' => array(
                    'pageSize' => self::PAGE_SIZE,
                    'page' => 0,
                ),
            ));

            $seconds = $dataProvider->totalCount * self::SECONDS_PER_QUESTIONS;
            $questionsLeft = $dataProvider->totalCount;

            return $this->render('start', array(
                'dataProvider' => $dataProvider,
                'seconds' => $seconds,
                'questionsLeft' => $questionsLeft,
            ));
        }


    public function actionChange()
    {
        $page = 1;
        if(isset($_POST['page']))
        {
            $page = $_POST['page'];
        }

        $dataProvider = new ArrayDataProvider(array(
            'allModels' => Yii::$app->session['answers'],
            'pagination' => array(
                'pageSize'=>self::PAGE_SIZE,
                'page' => $page - 1,
            ),
        ));

        $paramKeys = array_keys($_POST);
        $paramValues = array_values($_POST);

        $i = 0;
        foreach ($paramKeys as $paramKey)
        {
            if($paramKey !== 'end' && $paramKey !== 'seconds' && $paramKey !== 'questionsLeft'
                && $paramKey !== '_csrf' && $paramKey !== 'submitButton')
            {
                if($paramKey !== 'page' && $paramKey !== 'task')
                {
                    $session = Yii::$app->session;
                    if(isset($session['answers'][$paramKey])){
                        $answer = $session['answers'][$paramKey];
                        $answer->user_answer = intval($paramValues[$i]);
                    }

                }
            }
            elseif ($paramKey === 'end' && $paramValues[$i] === '1')
            {
                $this->redirect(array('finish'));
            }
            $i++;
        }

        if(isset($_POST['seconds']))
        {
            $seconds = $_POST['seconds'] - 1;
            if($seconds <= 0)
            {
                $this->redirect(array('finish'));
            }
        }

        if(isset($_POST['questionsLeft']))
        {
            $questionsLeft = $_POST['questionsLeft'];
        }

        return $this->render('start', array(
            'dataProvider'=>$dataProvider,
            'seconds'=>$seconds,
            'questionsLeft'=>$questionsLeft,
        ));
    }

    public function actionFinish()
    {
        $session = Yii::$app->session;
        if(session_id() == '' || !isset($_SESSION))
            session_start();

        $page = 1;
        if(isset($_POST['page']))
        {
            $page = $_POST['page'];
        }

        $dataProvider = new ArrayDataProvider(array(
            'allModels' => $session['answers'],
            'pagination' => array(
                'pageSize'=>self::PAGE_SIZE,
                'page' => $page - 1,
            ),
        ));


        if($dataProvider->totalCount == 0)
            throw new HttpException(404, 'Not Found');

        $session = Yii::$app->session;
        $userAnswers = $session['answers'];
        $correctAnswers = 0;
            foreach ((array)$userAnswers as $answer)
            {
                $question = Question::find()
                    ->where(array('id' => $answer->question_id, 'task_id' => Yii::$app->session['task']))
                    ->one();

                if($answer->user_answer === intval($answer->answer))
                    $correctAnswers++;
            }



        $score = round($correctAnswers / $dataProvider->totalCount * 100, 2);


        $diplomaForm = null;
        if(self::MINIMUM_SCORE !== false && $score >= self::MINIMUM_SCORE)
        {
            $diplomaForm = new DiplomaForm();
            if(isset($_POST['DiplomaForm']))
            {
                $diplomaForm->attributes = $_POST['DiplomaForm'];
                if($diplomaForm->validate())
                {
                    require __DIR__ . '/../lib/fpdf/fpdf.php';
                    $pdf = new \FPDF('L', 'mm', 'A4');
                    $pdf->SetDisplayMode('fullpage');
                    $pdf->SetTitle('Diploma for you');
                    $pdf->AddPage();
                    $pdf->Image(__DIR__ . '/../web/image/marble.jpg', 0,0,$pdf->w, $pdf->h);
                    $pdf->Image(__DIR__ . '/../web/image/diploma-frame.gif', 0,0,$pdf->w, $pdf->h);

                    $pdf->Ln(45);

                    $text = 'Certificate of Recognition';
                    $w = $pdf->GetStringWidth($text)+6;
                    $pdf->SetX(($pdf->w-$w)/2);
                    $pdf->SetTextColor(0,0,255);
                    $pdf->SetFont('Arial','I',40);
                    $pdf->Cell($w,9,$text,0,1,'C',false);

                    $text = '';
                    $w = $pdf->GetStringWidth($text)+6;
                    $pdf->SetFont('Arial','B',15);
                    $pdf->Cell($w,5,$text,0,0,'C',false);

                    $pdf->Ln();

                    $task = Task::find()
                        ->where(array('id' => Yii::$app->session['task']))
                        ->one();

                    $text = 'This certificate accredits that the ' . $task->name . ' online test has been successfully passed by:';
                    $w = $pdf->GetStringWidth($text)+6;
                    $pdf->SetX(($pdf->w-$w)/2);
                    $pdf->SetTextColor(0,0,0);
                    $pdf->SetFont('Arial','B',15);
                    $pdf->Cell($w,20,$text,0,0,'C',false);

                    $pdf->Ln(30);

                    $text = $diplomaForm->name;
                    $w = $pdf->GetStringWidth($text)+6;
                    $pdf->SetX(($pdf->w-$w)/2);
                    $pdf->SetFont('Arial','B',40);
                    $pdf->Cell($w,20,$text,0,0,'C',false);

                    $pdf->Ln(50);

                    Yii::$app->session['diplomaGot'] = 1;
                    $pdf->Output();
                }
            }
        }
        return $this->render('finish', array(
            'score' => $score,
            'dataProvider' => $dataProvider,
            'diplomaForm' => $diplomaForm,
        ));
    }

}

<?php

namespace frontend\controllers;

use Yii;
use common\models\Result;
use common\models\ResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultController implements the CRUD actions for Result model.
 */
class ResultController extends Controller
{
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
     * Lists all Result models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Result model.
     * @param string $feedback
     * @param integer $stud_answer_choice_id
     * @param integer $stud_answer_choice_question_id
     * @param integer $stud_answer_student_id
     * @return mixed
     */
    public function actionView($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id),
        ]);
    }

    /**
     * Creates a new Result model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Result();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'feedback' => $model->feedback, 'stud_answer_choice_id' => $model->stud_answer_choice_id, 'stud_answer_choice_question_id' => $model->stud_answer_choice_question_id, 'stud_answer_student_id' => $model->stud_answer_student_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Result model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $feedback
     * @param integer $stud_answer_choice_id
     * @param integer $stud_answer_choice_question_id
     * @param integer $stud_answer_student_id
     * @return mixed
     */
    public function actionUpdate($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id)
    {
        $model = $this->findModel($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'feedback' => $model->feedback, 'stud_answer_choice_id' => $model->stud_answer_choice_id, 'stud_answer_choice_question_id' => $model->stud_answer_choice_question_id, 'stud_answer_student_id' => $model->stud_answer_student_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Result model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $feedback
     * @param integer $stud_answer_choice_id
     * @param integer $stud_answer_choice_question_id
     * @param integer $stud_answer_student_id
     * @return mixed
     */
    public function actionDelete($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id)
    {
        $this->findModel($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Result model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $feedback
     * @param integer $stud_answer_choice_id
     * @param integer $stud_answer_choice_question_id
     * @param integer $stud_answer_student_id
     * @return Result the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($feedback, $stud_answer_choice_id, $stud_answer_choice_question_id, $stud_answer_student_id)
    {
        if (($model = Result::findOne(['feedback' => $feedback, 'stud_answer_choice_id' => $stud_answer_choice_id, 'stud_answer_choice_question_id' => $stud_answer_choice_question_id, 'stud_answer_student_id' => $stud_answer_student_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

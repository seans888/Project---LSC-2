<?php

namespace backend\controllers;

use Yii;
use common\models\StudAnswer;
use common\models\StudAnswerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudAnswerController implements the CRUD actions for StudAnswer model.
 */
class StudAnswerController extends Controller
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
     * Lists all StudAnswer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudAnswer model.
     * @param integer $choice_id
     * @param integer $choice_question_id
     * @param integer $student_id
     * @return mixed
     */
    public function actionView($choice_id, $choice_question_id, $student_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($choice_id, $choice_question_id, $student_id),
        ]);
    }

    /**
     * Creates a new StudAnswer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudAnswer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'choice_id' => $model->choice_id, 'choice_question_id' => $model->choice_question_id, 'student_id' => $model->student_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StudAnswer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $choice_id
     * @param integer $choice_question_id
     * @param integer $student_id
     * @return mixed
     */
    public function actionUpdate($choice_id, $choice_question_id, $student_id)
    {
        $model = $this->findModel($choice_id, $choice_question_id, $student_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'choice_id' => $model->choice_id, 'choice_question_id' => $model->choice_question_id, 'student_id' => $model->student_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StudAnswer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $choice_id
     * @param integer $choice_question_id
     * @param integer $student_id
     * @return mixed
     */
    public function actionDelete($choice_id, $choice_question_id, $student_id)
    {
        $this->findModel($choice_id, $choice_question_id, $student_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $choice_id
     * @param integer $choice_question_id
     * @param integer $student_id
     * @return StudAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($choice_id, $choice_question_id, $student_id)
    {
        if (($model = StudAnswer::findOne(['choice_id' => $choice_id, 'choice_question_id' => $choice_question_id, 'student_id' => $student_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

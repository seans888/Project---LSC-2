<?php

namespace backend\controllers;

use Yii;
use common\models\Schedule;
use common\models\ScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
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
     * Lists all Schedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schedule model.
     * @param integer $id
     * @param integer $student_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionView($id, $student_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $student_id, $course_id),
        ]);
    }

    /**
     * Creates a new Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Schedule();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'student_id' => $model->student_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Schedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $student_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionUpdate($id, $student_id, $course_id)
    {
        $model = $this->findModel($id, $student_id, $course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'student_id' => $model->student_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Schedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $student_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionDelete($id, $student_id, $course_id)
    {
        $this->findModel($id, $student_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $student_id
     * @param integer $course_id
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $student_id, $course_id)
    {
        if (($model = Schedule::findOne(['id' => $id, 'student_id' => $student_id, 'course_id' => $course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

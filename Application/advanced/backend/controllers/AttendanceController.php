<?php

namespace backend\controllers;

use Yii;
use common\models\Attendance;
use common\models\AttendanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttendanceController implements the CRUD actions for Attendance model.
 */
class AttendanceController extends Controller
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
     * Lists all Attendance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttendanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attendance model.
     * @param integer $class_list_user_id
     * @param integer $class_list_course_id
     * @param integer $schedule_id
     * @return mixed
     */
    public function actionView($class_list_user_id, $class_list_course_id, $schedule_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($class_list_user_id, $class_list_course_id, $schedule_id),
        ]);
    }

    /**
     * Creates a new Attendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attendance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'class_list_user_id' => $model->class_list_user_id, 'class_list_course_id' => $model->class_list_course_id, 'schedule_id' => $model->schedule_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Attendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $class_list_user_id
     * @param integer $class_list_course_id
     * @param integer $schedule_id
     * @return mixed
     */
    public function actionUpdate($class_list_user_id, $class_list_course_id, $schedule_id)
    {
        $model = $this->findModel($class_list_user_id, $class_list_course_id, $schedule_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'class_list_user_id' => $model->class_list_user_id, 'class_list_course_id' => $model->class_list_course_id, 'schedule_id' => $model->schedule_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Attendance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $class_list_user_id
     * @param integer $class_list_course_id
     * @param integer $schedule_id
     * @return mixed
     */
    public function actionDelete($class_list_user_id, $class_list_course_id, $schedule_id)
    {
        $this->findModel($class_list_user_id, $class_list_course_id, $schedule_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Attendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $class_list_user_id
     * @param integer $class_list_course_id
     * @param integer $schedule_id
     * @return Attendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($class_list_user_id, $class_list_course_id, $schedule_id)
    {
        if (($model = Attendance::findOne(['class_list_user_id' => $class_list_user_id, 'class_list_course_id' => $class_list_course_id, 'schedule_id' => $schedule_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

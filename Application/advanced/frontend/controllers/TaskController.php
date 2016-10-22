<?php

namespace frontend\controllers;

use Yii;
use common\models\Task;
use common\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
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
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @param integer $course_id
     * @param integer $course_employee_id
     * @return mixed
     */
    public function actionView($id, $course_id, $course_employee_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $course_id, $course_employee_id),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'course_id' => $model->course_id, 'course_employee_id' => $model->course_employee_id]);
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
     * @param integer $course_id
     * @param integer $course_employee_id
     * @return mixed
     */
    public function actionUpdate($id, $course_id, $course_employee_id)
    {
        $model = $this->findModel($id, $course_id, $course_employee_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'course_id' => $model->course_id, 'course_employee_id' => $model->course_employee_id]);
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
     * @param integer $course_id
     * @param integer $course_employee_id
     * @return mixed
     */
    public function actionDelete($id, $course_id, $course_employee_id)
    {
        $this->findModel($id, $course_id, $course_employee_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $course_id
     * @param integer $course_employee_id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $course_id, $course_employee_id)
    {
        if (($model = Task::findOne(['id' => $id, 'course_id' => $course_id, 'course_employee_id' => $course_employee_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

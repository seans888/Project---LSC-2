<?php

namespace backend\controllers;

use Yii;
use common\models\EmployeeCreatesCourse;
use common\models\EmployeeCreatesCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeCreatesCourseController implements the CRUD actions for EmployeeCreatesCourse model.
 */
class EmployeeCreatesCourseController extends Controller
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
     * Lists all EmployeeCreatesCourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeCreatesCourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeCreatesCourse model.
     * @param integer $employee_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionView($employee_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($employee_id, $course_id),
        ]);
    }

    /**
     * Creates a new EmployeeCreatesCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeCreatesCourse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'employee_id' => $model->employee_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmployeeCreatesCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $employee_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionUpdate($employee_id, $course_id)
    {
        $model = $this->findModel($employee_id, $course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'employee_id' => $model->employee_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmployeeCreatesCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $employee_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionDelete($employee_id, $course_id)
    {
        $this->findModel($employee_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmployeeCreatesCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $employee_id
     * @param integer $course_id
     * @return EmployeeCreatesCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($employee_id, $course_id)
    {
        if (($model = EmployeeCreatesCourse::findOne(['employee_id' => $employee_id, 'course_id' => $course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

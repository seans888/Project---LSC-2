<?php

namespace frontend\controllers;

use Yii;
use common\models\EmployeeSubmitsGrade;
use common\models\EmployeeSubmitsGradeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeSubmitsGradeController implements the CRUD actions for EmployeeSubmitsGrade model.
 */
class EmployeeSubmitsGradeController extends Controller
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
     * Lists all EmployeeSubmitsGrade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSubmitsGradeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeSubmitsGrade model.
     * @param integer $employee_id
     * @param integer $grade_id
     * @param integer $grade_student_id
     * @param integer $grade_course_id
     * @return mixed
     */
    public function actionView($employee_id, $grade_id, $grade_student_id, $grade_course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($employee_id, $grade_id, $grade_student_id, $grade_course_id),
        ]);
    }

    /**
     * Creates a new EmployeeSubmitsGrade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeSubmitsGrade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'employee_id' => $model->employee_id, 'grade_id' => $model->grade_id, 'grade_student_id' => $model->grade_student_id, 'grade_course_id' => $model->grade_course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmployeeSubmitsGrade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $employee_id
     * @param integer $grade_id
     * @param integer $grade_student_id
     * @param integer $grade_course_id
     * @return mixed
     */
    public function actionUpdate($employee_id, $grade_id, $grade_student_id, $grade_course_id)
    {
        $model = $this->findModel($employee_id, $grade_id, $grade_student_id, $grade_course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'employee_id' => $model->employee_id, 'grade_id' => $model->grade_id, 'grade_student_id' => $model->grade_student_id, 'grade_course_id' => $model->grade_course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmployeeSubmitsGrade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $employee_id
     * @param integer $grade_id
     * @param integer $grade_student_id
     * @param integer $grade_course_id
     * @return mixed
     */
    public function actionDelete($employee_id, $grade_id, $grade_student_id, $grade_course_id)
    {
        $this->findModel($employee_id, $grade_id, $grade_student_id, $grade_course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmployeeSubmitsGrade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $employee_id
     * @param integer $grade_id
     * @param integer $grade_student_id
     * @param integer $grade_course_id
     * @return EmployeeSubmitsGrade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($employee_id, $grade_id, $grade_student_id, $grade_course_id)
    {
        if (($model = EmployeeSubmitsGrade::findOne(['employee_id' => $employee_id, 'grade_id' => $grade_id, 'grade_student_id' => $grade_student_id, 'grade_course_id' => $grade_course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

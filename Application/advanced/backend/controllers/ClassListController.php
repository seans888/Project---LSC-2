<?php

namespace backend\controllers;

use Yii;
use common\models\ClassList;
use common\models\ClassListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClassListController implements the CRUD actions for ClassList model.
 */
class ClassListController extends Controller
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
     * Lists all ClassList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClassListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClassList model.
     * @param integer $user_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionView($user_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $course_id),
        ]);
    }

    /**
     * Creates a new ClassList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClassList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ClassList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionUpdate($user_id, $course_id)
    {
        $model = $this->findModel($user_id, $course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ClassList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionDelete($user_id, $course_id)
    {
        $this->findModel($user_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClassList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $course_id
     * @return ClassList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $course_id)
    {
        if (($model = ClassList::findOne(['user_id' => $user_id, 'course_id' => $course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace backend\controllers;

use Yii;
use common\models\Student;
use common\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can( 'create student')){
			$model = new Student();

			if ($model->load(Yii::$app->request->post())) {
				if($model->save())
				{
					echo 1;
				}else{
					echo 0;
				}
				//return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->renderAjax('create', [
					'model' => $model,
				]);
			}
		}else{
			throw new ForbiddenHttpException;
		}
    }
	
	//Imports data from the excel sheet
	public function actionImportExcel()
	{
			$inputFile = 'backend/controllers/student.xlsx';
			try{
				$inputFileType = \PHPExcel_IOFactory::identify($inputFile);
				$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFile);
			}catch(Exception $e)
			{
				die('Error');
			}
			
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
			
			for( $row = 1; $row <= $highestRow; $row++ )
			{
				$rowData = $sheet->rangeToArray('A'.$row.';'.$highestColumn.$row,NULL,TRUE,FALSE);
				
				if($row = 1)
				{
					continue;
				}
				
				$student = new Student();
				$id = $rowData[0][0];
				$student->username = $rowData[0][1];
				$student->password = $rowData[0][2];
				$student->lastname = $rowData[0][3];
				$student->firstname = $rowData[0][4];
				$student->middlename = $rowData[0][5];
				$student->nickname = $rowData[0][6];
				$student->gender = $rowData[0][7];
				$student->age = $rowData[0][8];
				$student->email_address = $rowData[0][9];
				$student->contact_number = $rowData[0][10];
				$student->address = $rowData[0][11];
				$student->school = $rowData[0][12];
				$student->school_address = $rowData[0][13];
				$student->guardian_name = $rowData[0][14];
				$student->date_of_registration = $rowData[0][15];
				$student->status = $rowData[0][16];
				
				$student->save();
				
				print_r($student->getErrors());
			}
	}

    /**
     * Updates an existing Student model.
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
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

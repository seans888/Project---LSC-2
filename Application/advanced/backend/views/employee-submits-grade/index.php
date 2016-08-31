<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EmployeeSubmitsGradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Submits Grades';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="employee-submits-grade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee Submits Grade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employee_id',
            'grade_id',
            'grade_student_id',
            'grade_course_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

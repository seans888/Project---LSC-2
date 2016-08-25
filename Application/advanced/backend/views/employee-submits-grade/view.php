<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSubmitsGrade */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Submits Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-submits-grade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'employee_id' => $model->employee_id, 'grade_id' => $model->grade_id, 'grade_student_id' => $model->grade_student_id, 'grade_course_id' => $model->grade_course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'employee_id' => $model->employee_id, 'grade_id' => $model->grade_id, 'grade_student_id' => $model->grade_student_id, 'grade_course_id' => $model->grade_course_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employee_id',
            'grade_id',
            'grade_student_id',
            'grade_course_id',
        ],
    ]) ?>

</div>

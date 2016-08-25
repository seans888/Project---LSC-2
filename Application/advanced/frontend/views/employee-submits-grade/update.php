<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSubmitsGrade */

$this->title = 'Update Employee Submits Grade: ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Submits Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'employee_id' => $model->employee_id, 'grade_id' => $model->grade_id, 'grade_student_id' => $model->grade_student_id, 'grade_course_id' => $model->grade_course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-submits-grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

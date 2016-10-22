<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Attendance */

$this->title = 'Update Attendance: ' . $model->class_list_course_id;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->class_list_course_id, 'url' => ['view', 'class_list_course_id' => $model->class_list_course_id, 'class_list_course_employee_id' => $model->class_list_course_employee_id, 'class_list_student_id' => $model->class_list_student_id, 'schedule_id' => $model->schedule_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

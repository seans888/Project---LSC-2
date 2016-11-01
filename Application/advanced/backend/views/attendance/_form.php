<?php

use common\models\Course;
use common\models\Employee;
use common\models\Schedule;
use common\models\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Attendance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Absent' => 'Absent', 'Late' => 'Late', 'Excuse' => 'Excuse', 'Present' => 'Present', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'class_list_course_id')->dropDownList(
        ArrayHelper::map(Course::find()->all(), 'id', 'title'),
        [
            'prompt'=>'Select Course',
        ]); ?>

    <?= $form->field($model, 'class_list_course_employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Employee',
        ]); ?>

    <?= $form->field($model, 'class_list_student_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Students',
        ]); ?>

    <?= $form->field($model, 'schedule_id')->dropDownList(
        ArrayHelper::map(Schedule::find()->all(), 'id', 'day'),
        [
            'prompt'=>'Select Students',
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

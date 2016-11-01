<?php

use common\models\Course;
use common\models\Employee;
use common\models\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClassList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        ArrayHelper::map(Course::find()->all(), 'id', 'title'),
        [
            'prompt'=>'Select Course',
        ]); ?>

    <?= $form->field($model, 'course_employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Employee',
        ]); ?>

    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Student',
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

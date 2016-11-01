<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Attendance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Absent' => 'Absent', 'Late' => 'Late', 'Excuse' => 'Excuse', 'Present' => 'Present', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'class_list_course_id')->textInput() ?>

    <?= $form->field($model, 'class_list_course_employee_id')->textInput() ?>

    <?= $form->field($model, 'class_list_student_id')->textInput() ?>

    <?= $form->field($model, 'schedule_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

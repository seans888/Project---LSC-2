<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Grade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homework')->textInput() ?>

    <?= $form->field($model, 'exercise')->textInput() ?>

    <?= $form->field($model, 'quiz')->textInput() ?>

    <?= $form->field($model, 'grade_final')->textInput() ?>

    <?= $form->field($model, 'attendance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

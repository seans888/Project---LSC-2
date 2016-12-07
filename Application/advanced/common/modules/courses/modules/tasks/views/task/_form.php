<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_type')->dropDownList([ 'Exam' => 'Exam', 'Quiz' => 'Quiz', 'Exercise' => 'Exercise', 'Assignment' => 'Assignment', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'time_open')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_close')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_open')->textInput() ?>

    <?= $form->field($model, 'date_close')->textInput() ?>

    <?= $form->field($model, 'time_remaining')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attempts')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

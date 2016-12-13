<?php

use common\models\Course;
use yii\helpers\ArrayHelper;
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

    <div class="col-sm-6">
        <?= $form->field($model, 'time_open')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'time_close')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'date_open')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'date_close')->textInput() ?>
    </div>

    <?= $form->field($model, 'time_remaining')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attempts')->textInput() ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        ArrayHelper::map(Course::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Select Course',

        ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

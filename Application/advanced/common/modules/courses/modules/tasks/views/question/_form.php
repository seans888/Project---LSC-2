<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .question-form{
        width: 90%;
        margin-left: 5%;;
    }
</style>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="col-sm-2">
        <?= $form->field($model, 'answer')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
        <?= $form->field($model, 'answer2')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
        <?= $form->field($model, 'answer3')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
        <?= $form->field($model, 'answer4')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
        <?= $form->field($model, 'answer5')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
        <?= $form->field($model, 'answer6')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

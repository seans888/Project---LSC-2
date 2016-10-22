<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stud-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'choice_id')->textInput() ?>

    <?= $form->field($model, 'choice_question_id')->textInput() ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

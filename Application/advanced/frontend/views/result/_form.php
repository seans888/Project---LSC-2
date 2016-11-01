<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Result */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feedback')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_grade')->textInput() ?>

    <?= $form->field($model, 'max_grade')->textInput() ?>

    <?= $form->field($model, 'stud_answer_choice_id')->textInput() ?>

    <?= $form->field($model, 'stud_answer_choice_question_id')->textInput() ?>

    <?= $form->field($model, 'stud_answer_student_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'feedback') ?>

    <?= $form->field($model, 'min_grade') ?>

    <?= $form->field($model, 'max_grade') ?>

    <?= $form->field($model, 'stud_answer_choice_id') ?>

    <?= $form->field($model, 'stud_answer_choice_question_id') ?>

    <?php // echo $form->field($model, 'stud_answer_student_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

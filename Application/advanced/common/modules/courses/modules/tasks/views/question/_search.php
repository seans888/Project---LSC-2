<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'answer') ?>

    <?= $form->field($model, 'answer2') ?>

    <?= $form->field($model, 'answer3') ?>

    <?php // echo $form->field($model, 'answer4') ?>

    <?php // echo $form->field($model, 'answer5') ?>

    <?php // echo $form->field($model, 'answer6') ?>

    <?php // echo $form->field($model, 'task_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

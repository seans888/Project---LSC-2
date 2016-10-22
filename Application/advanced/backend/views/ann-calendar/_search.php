<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AnnCalendarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ann-calendar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'announcement') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'task_id') ?>

    <?= $form->field($model, 'task_course_id') ?>

    <?php // echo $form->field($model, 'task_course_employee_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

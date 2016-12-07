<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'task_type') ?>

    <?= $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'time_open') ?>

    <?php // echo $form->field($model, 'time_close') ?>

    <?php // echo $form->field($model, 'date_open') ?>

    <?php // echo $form->field($model, 'date_close') ?>

    <?php // echo $form->field($model, 'time_remaining') ?>

    <?php // echo $form->field($model, 'attempts') ?>

    <?php // echo $form->field($model, 'course_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

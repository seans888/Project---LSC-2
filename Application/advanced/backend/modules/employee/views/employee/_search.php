<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\employee\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?php //echo $form->field($model, 'auth_key') ?>

    <?php //echo $form->field($model, 'password_hash') ?>

    <?php //echo $form->field($model, 'password_reset_token') ?>

    <?= $form->field($model, 'email') ?>

    <?php  //echo $form->field($model, 'status') ?>

    <?php  //echo $form->field($model, 'created_at') ?>

    <?php  //echo $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'contact_number') ?>

    <?= $form->field($model, 'home_address') ?>

    <?php  //echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

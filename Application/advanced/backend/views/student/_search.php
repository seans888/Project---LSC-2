<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'firstname') ?>

    <?php // echo $form->field($model, 'middlename') ?>

    <?php // echo $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'email_address') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'school') ?>

    <?php // echo $form->field($model, 'school_address') ?>

    <?php // echo $form->field($model, 'guardian_name') ?>

    <?php // echo $form->field($model, 'date_of_registration') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

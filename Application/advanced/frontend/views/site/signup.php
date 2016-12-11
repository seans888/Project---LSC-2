<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>

<style>

</style>

<div class="site-signup"><br/>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <div class="col-sm-4">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </div>

                <div class="col-sm-4">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>

                <div class="col-sm-4">
                    <?= $form->field($model, 'email') ?>
                </div>


                <div class="col-sm-4">
                    <?= $form->field($model, 'first_name') ?>
                </div>

                <div class="col-sm-4">
                    <?= $form->field($model, 'middle_name') ?>
                </div>

                <div class="col-sm-4">
                    <?= $form->field($model, 'last_name') ?>
                </div>

                <div class="col-sm-6">
                    <?= $form->field($model, 'gender')->dropDownList(
                        [
                            'Male' => 'Male',
                            'Female' => 'Female'

                        ],
                        ['prompt' => 'Select your gender']) ?>
                </div>

                <div class="col-sm-6">
                    <?= $form->field($model, 'contact_number') ?>
                </div>

                <?= $form->field($model, 'home_address') ?>


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

</div>

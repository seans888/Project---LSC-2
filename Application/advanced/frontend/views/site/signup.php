<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-signup"><br/>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'first_name') ?>

                <?= $form->field($model, 'middle_name') ?>

                <?= $form->field($model, 'last_name') ?>

                <?= $form->field($model, 'gender')->dropDownList(
                    [
                        'Male' => 'Male',
                        'Female' => 'Female'

                    ],
                    ['prompt' => 'Select your gender']) ?>

                <?= $form->field($model, 'contact_number') ?>

                <?= $form->field($model, 'home_address') ?>

                <?= $form->field($model, 'image') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

</div>

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\EmployeeSignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-box">
        <div class="login-logo">
            <img src="http://i1044.photobucket.com/albums/b444/jgtadeo/Loyola-Student-Center%201_zpsbbvbqnsv.png" width="100" height="60"/><br/>
            <hr size="10px"/>
            <a href="index.php"><b>LSC </b> LMS</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">SIGN UP</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'first_name') ?>

            <?= $form->field($model, 'middle_name') ?>

            <?= $form->field($model, 'last_name') ?>

            <?= $form->field($model, 'contact_number') ?>

            <?= $form->field($model, 'home_address') ?>


            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

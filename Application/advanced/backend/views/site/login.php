<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
        <div class="login-box">
        <div class="login-logo">
            <img src="http://i1044.photobucket.com/albums/b444/jgtadeo/Loyola-Student-Center%201_zpsbbvbqnsv.png" width="100" height="60"/><br/>
            <hr zize="10px"/>
            <a href="index.php"><b>LSC </b> LMS</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">SIGN IN</p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username', ['options'=>[
                            'tag' => 'div',
                            'class' =>'form-group field-loginform-username has-feedback required'
                            ],
                            'template'=>'{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>
                                         {error}{hint}'
                        ])->textInput(['placeholder'=>'Username']) ?>

                    <?= $form->field($model, 'password', ['options'=>[
                             'tag' => 'div',
                             'class' =>'form-group field-loginform-password has-feedback required'
                             ],
                             'template'=>'{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                         {error}{hint}'
                        ])->passwordInput(['placeholder'=>'Password']) ?>

                    <?= $form->field($model, 'rememberMe', ['options'=>[
                            'tag' => 'div',
                            'class' =>'checkbox icheck'
                             ],
                            'template'=>'{input}<span class="icheckbox_square-blue checked"></span>'
                        ])->checkbox() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button'])?>
                    </div>
                <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

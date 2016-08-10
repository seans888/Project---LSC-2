<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'LSC Learning Management System';

?><br><br><br><br>
<center>
	
	<div id = 'login'><br><br>
	<h1><font size="20px">LOGIN</font></h1>
	<div class='form'>
	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
		<span class='input'>
		<span class='icon username-icon fontawesome-user'></span>
			<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?> <br>
		</span>
		<span class='input'>
			<span class='password-icon-style icon password-icon fontawesome-lock'></span>
			<?= $form->field($model, 'password')->passwordInput() ?>
		</span>
		
		<?= $form->field($model, 'rememberMe')->checkbox() ?>
		<div class="form-group">
			<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>
		<?php ActiveForm::end(); 
	?>
	</div>
	</div>
			

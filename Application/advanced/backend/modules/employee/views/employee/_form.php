<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\employee\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>
	<br>
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div><br>


	<div class="col-sm-6">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="col-sm-6">
    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-4">
    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-4">
    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-4">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="col-sm-6">
    <?= $form->field($model, 'status')->textInput() ?>
	</div>
	
	<div class="col-sm-6">
    <?= $form->field($model, 'created_at')->textInput() ?>
	</div>
	
	<div class="col-sm-4">
    <?= $form->field($model, 'updated_at')->textInput() ?>
	</div>
	
	<div class="col-sm-4">
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-4">
    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-6">
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-6">
    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
	</div>
	
	
    <?= $form->field($model, 'home_address')->textInput(['maxlength' => true]) ?>
	

    
    <?php ActiveForm::end(); ?>

</div>

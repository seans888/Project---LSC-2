<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>
	<br>
 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div><br>
	<div class="col-sm-6">
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-6">
    <?= $form->field($model, 'day')->dropDownList([ 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', ], ['prompt' => '']) ?>
	</div>
	
	<div class="col-sm-6">
    <?= $form->field($model, 'schedule')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-sm-6">
    <?= $form->field($model, 'user_id')->textInput() ?>
	</div>
	
   

    <?php ActiveForm::end(); ?>

</div>

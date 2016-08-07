<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Course;
use common\models\Student;

/* @var $this yii\web\View */
/* @var $model common\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'student_id')->dropDownList(
		ArrayHelper::map( Student::find()->all(), 'id', 'username'),
		[
			'prompt'=>'Select Student',
			//'onchange'=>'
			//	$.post("index.php?r=work-orders/lists&id='.'"+$(this).val(), function(data){
			//		$("select#models-contact").html(data);
			//		});'
		]); ?>

	<?= $form->field($model, 'course_id')->dropDownList(
		ArrayHelper::map( Course::find()->all(), 'id', 'course_name'),
		[
			'prompt'=>'Select Course',
			//'onchange'=>'
			//	$.post("index.php?r=work-orders/lists&id='.'"+$(this).val(), function(data){
			//		$("select#models-contact").html(data);
			//		});'
		]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

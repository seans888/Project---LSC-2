<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Student;
use common\models\Course;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Grade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grade-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'date')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
	]);?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homework')->textInput() ?>

    <?= $form->field($model, 'exercise')->textInput() ?>

    <?= $form->field($model, 'quiz')->textInput() ?>

    <?= $form->field($model, 'grade_final')->textInput() ?>

    <?= $form->field($model, 'attendance')->textInput(['maxlength' => true]) ?>

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

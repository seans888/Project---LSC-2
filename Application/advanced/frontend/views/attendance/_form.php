<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;
use common\models\Course;
use common\models\Schedule;

/* @var $this yii\web\View */
/* @var $model common\models\Attendance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-form">

    <?php $form = ActiveForm::begin(); ?><br>

    <?= $form->field($model, 'status')->dropDownList(
	[ 'Absent' => 'Absent', 'Late' => 'Late', 'Excuse' => 'Excuse', 'Present' => 'Present', 
	], ['prompt' => 'Select Status']) ?>

	<div class="col-sm-6">
	<?= $form->field($model, 'class_list_user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'username'),
        [
            'prompt' => 'Select Select Student',

        ]);?>
	</div>
	
	<div class="col-sm-6">
	<?= $form->field($model, 'class_list_course_id')->dropDownList(
        ArrayHelper::map(Course::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Select Select Course',

        ]);?>
	</div>
	

	

		<div class="col-sm-6">
		<?= $form->field($model, 'schedule_id')->dropDownList(
        ArrayHelper::map(Schedule::find()->all(), 'id', 'schedule'),
        [
            'prompt' => 'Select Time',

        ]);?>
		</div>
		
		<div class="col-sm-6">
		<?= $form->field($model, 'schedule_id')->dropDownList(
        ArrayHelper::map(Schedule::find()->all(), 'id', 'day'),
        [
            'prompt' => 'Select Day',

        ]);?>
		</div>
	
		
		
		

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

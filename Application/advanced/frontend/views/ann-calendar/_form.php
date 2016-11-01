<?php

use common\models\Employee;
use common\models\Task;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AnnCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ann-calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'announcement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Employee',
        ]); ?>
    <?= $form->field($model, 'task_id')->dropDownList(
        ArrayHelper::map(Task::find()->all(), 'id', 'title'),
        [
            'prompt'=>'Select Task',
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

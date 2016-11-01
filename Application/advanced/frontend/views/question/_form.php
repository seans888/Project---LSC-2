<?php

use common\models\Course;
use common\models\Employee;
use common\models\Task;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ask')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_id')->dropDownList(
        ArrayHelper::map(Task::find()->all(), 'id', 'title'),
        [
            'prompt'=>'Select Task',
        ]); ?>

    <?= $form->field($model, 'task_course_id')->dropDownList(
        ArrayHelper::map(Course::find()->all(), 'id', 'title'),
        [
            'prompt'=>'Select Course',
        ]); ?>

    <?= $form->field($model, 'task_course_employee_id')->dropDownList(
        ArrayHelper::map(Employee::find()->all(), 'id', 'title'),
        [
            'prompt'=>'Select Employee',
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

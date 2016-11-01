<?php

use common\models\Choice;
use common\models\Question;
use common\models\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stud-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'choice_id')->dropDownList(
        ArrayHelper::map(Choice::find()->all(), 'id', 'choose'),
        [
            'prompt'=>'Choices',
        ]); ?>

    <?= $form->field($model, 'choice_question_id')->dropDownList(
        ArrayHelper::map(Question::find()->all(), 'id', 'ask'),
        [
            'prompt'=>'Questions',
        ]); ?>

    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Students',
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

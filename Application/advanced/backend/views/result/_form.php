<?php

use common\models\Choice;
use common\models\Question;
use common\models\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Result */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feedback')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_grade')->textInput() ?>

    <?= $form->field($model, 'max_grade')->textInput() ?>

    <?= $form->field($model, 'stud_answer_choice_id')->dropDownList(
        ArrayHelper::map(Choice::find()->all(), 'id', 'choose'),
        [
            'prompt'=>'Choices',
        ]); ?>

    <?= $form->field($model, 'stud_answer_choice_question_id')->dropDownList(
        ArrayHelper::map(Question::find()->all(), 'id', 'ask'),
        [
            'prompt'=>'Questions',
        ]); ?>

    <?= $form->field($model, 'stud_answer_student_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(), 'id', 'first_name'),
        [
            'prompt'=>'Select Students',
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

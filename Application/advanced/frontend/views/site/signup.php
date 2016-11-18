<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-signup"><br/>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'status_student')->dropDownList(
                [
                    'Reserved' => 'Reserved',
                    'Enrolled' => 'Enrolled',
                    'Cancelled' => 'Cancelled',
                    'Done' => 'Done'
                ],
                ['prompt' => 'Select status here']) ?>

            <?= $form->field($model, 'number_of_hours') ?>

            <?= $form->field($model, 'review_class')->dropDownList(
                [
                    'Senior High / College Entrance Review' => 'Senior High / College Entrance Review',
                    'High School Entrance Test / Science High School Review' => 'High School Entrance Test / Science High School Review',
                    'National Medical Admission Test Review' => 'National Medical Admission Test Review',
                    'Law Aptitude Exam / Law School Admission Test Review' => 'Law Aptitude Exam / Law School Admission Test Review',
                    'Civil Service Exam Review' => 'Civil Service Exam Review'
                ],
                ['prompt' => 'Select review class']) ?>

            <?= $form->field($model, 'first_name') ?>

            <?= $form->field($model, 'middle_name') ?>

            <?= $form->field($model, 'guardian_email_address') ?>

            <?= $form->field($model, 'last_name') ?>

            <?= $form->field($model, 'nickname') ?>

            <?= $form->field($model, 'gender')->dropDownList(
                [
                    'Male' => 'Male',
                    'Female' => 'Female'

                ],
                ['prompt' => 'Select your gender']) ?>

            <?= $form->field($model, 'age') ?>

            <?= $form->field($model, 'contact_number') ?>

            <?= $form->field($model, 'home_address') ?>

            <?= $form->field($model, 'school') ?>

            <?= $form->field($model, 'school_address') ?>

            <?= $form->field($model, 'guardian_name') ?>

            <?= $form->field($model, 'relation')->dropDownList(
                [
                    'Mother' => 'Mother',
                    'Father' => 'Father',
                    'Sister' => 'Sister',
                    'Brother' => 'Brother',
                    'Auntie' => 'Auntie',
                    'Uncle' => 'Uncle',
                    'Lolo' => 'Lolo',
                    'Lola' => 'Lola',
                    'Others' => 'Others',

                ],
                ['prompt' => 'Select the relationship with your guardian']) ?>

            <?= $form->field($model, 'guardian_contact_number') ?>

            <?= $form->field($model, 'date_of_registration') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

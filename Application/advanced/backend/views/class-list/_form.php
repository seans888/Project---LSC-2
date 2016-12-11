<?php

use common\models\Course;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClassList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm=6">
        <?= $form->field($model, 'user_id')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id', 'id'),
            [
                'prompt' => 'Select Student',
                /*'onChange' => '
                    $.post("index.php?r=courses/lists&id='.'"+$(this).val(), function(
                        $("select#models-contact).html(data);
                    });'*/
            ]);
        ?>
    </div>

    <div class="col-sm-6">
        <?= $form->field($model, 'course_id')->dropDownList(
            ArrayHelper::map(Course::find()->all(), 'id', 'name'),
            [
                'prompt' => 'Select Course',
                /*'onChange' => '
                    $.post("index.php?r=courses/lists&id='.'"+$(this).val(), function(
                        $("select#models-contact).html(data);
                    });'*/
            ]);
        ?>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

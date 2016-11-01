<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudAnswer */

$this->title = 'Update Stud Answer: ' . $model->choice_id;
$this->params['breadcrumbs'][] = ['label' => 'Stud Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->choice_id, 'url' => ['view', 'choice_id' => $model->choice_id, 'choice_question_id' => $model->choice_question_id, 'student_id' => $model->student_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stud-answer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

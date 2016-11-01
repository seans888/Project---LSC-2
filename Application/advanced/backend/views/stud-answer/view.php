<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StudAnswer */

$this->title = $model->choice_id;
$this->params['breadcrumbs'][] = ['label' => 'Stud Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stud-answer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'choice_id' => $model->choice_id, 'choice_question_id' => $model->choice_question_id, 'student_id' => $model->student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'choice_id' => $model->choice_id, 'choice_question_id' => $model->choice_question_id, 'student_id' => $model->student_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'choice_id',
            'choice_question_id',
            'student_id',
        ],
    ]) ?>

</div>

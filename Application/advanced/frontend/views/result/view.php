<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Result */

$this->title = $model->feedback;
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'feedback' => $model->feedback, 'stud_answer_choice_id' => $model->stud_answer_choice_id, 'stud_answer_choice_question_id' => $model->stud_answer_choice_question_id, 'stud_answer_student_id' => $model->stud_answer_student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'feedback' => $model->feedback, 'stud_answer_choice_id' => $model->stud_answer_choice_id, 'stud_answer_choice_question_id' => $model->stud_answer_choice_question_id, 'stud_answer_student_id' => $model->stud_answer_student_id], [
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
            'feedback',
            'min_grade',
            'max_grade',
            'stud_answer_choice_id',
            'stud_answer_choice_question_id',
            'stud_answer_student_id',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudAnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stud Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stud-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stud Answer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'choice_id',
            'choice_question_id',
            'student_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

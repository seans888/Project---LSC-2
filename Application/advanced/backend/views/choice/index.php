<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ChoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Choices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Choice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'choose',
            'is_correct',
            'question_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

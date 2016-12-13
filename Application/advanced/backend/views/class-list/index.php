<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClassListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
         if(Yii::$app->user->can('add-classlist')){
            echo Html::a('Create Class List', ['create'], ['class' => 'btn btn-success']);
         }
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user.last_name:text:User',
            'course.name:text:Course',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

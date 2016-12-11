<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
?>
<div class="task-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'description',
            'task_type',
            //'date_created',
             'time_open',
             'time_close',
            // 'date_open',
            // 'date_close',
            // 'time_remaining',
            // 'attempts',
            // 'course_id',

        ],
    ]); ?>
</div>

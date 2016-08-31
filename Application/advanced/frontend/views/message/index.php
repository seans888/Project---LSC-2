<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
#w0{
	background:transparent;
}
</style>
<div class="sidenav">
	<a href="#">My Profile</a>
	<a href="#">Task</a>
	<a href="#">Message</a>
	<a href="#">Calendar</a>
</div>

<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'receiver_name',
            'receiver_email:email',
            'subject',
            'content:ntext',
            // 'attachment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

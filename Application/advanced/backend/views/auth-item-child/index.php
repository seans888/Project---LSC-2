<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuthItemChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Item Children';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sidenav">
	<a href="http://localhost/advanced/backend/web/index.php?r=task" target = "_self">Task</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=course">Course</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=student">Student</a>
	<a href="#">Calendar</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=grade">Grade</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=message">Message</a>
</div>
<div class="auth-item-child-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Auth Item Child', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'parent',
            'child',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
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

<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Course', ['value'=>Url::to('index.php?r=course/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
	
	<?php
	Modal::begin([
		'header' => '<h4>Course</h4>',
		'id' => 'modal',
		'size'=>'modal-lg',
	]);
	
	echo "<div id='modalContent'></div>";
	
	Modal::end();
	?>
	
	<?php Pjax::begin(['id'=>'courseGrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'course_name',
            'subject',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

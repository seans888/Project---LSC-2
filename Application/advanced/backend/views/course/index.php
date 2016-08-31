<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sidenav">
	<a href="http://localhost/advanced/backend/web/index.php?r=task" target = "_self">Task</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=course">Course</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=student">Student</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=event">Calendar</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=grade">Grade</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=message">Message</a>
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
		'pjax'=>true,
		'export'=>false,
        'columns' => [
		['class' => 'yii\grid\SerialColumn'],
			[
				'class'=>'kartik\grid\EditableColumn',
				'header'=>'COURSE',
				'attribute'=>'course_name',
			],
            
			[
				'class'=>'kartik\grid\EditableColumn',
				'header'=>'SUBJECT',
				'attribute'=>'subject',
				'value'=>'subject',
			],
		
            //'id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>



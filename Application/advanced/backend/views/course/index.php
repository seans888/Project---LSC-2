<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>


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
	
	<?php
		$gridColumns = [
			'id',
			'course_name',
			'subject',

		];
		
		echo ExportMenu::widget([
			'dataProvider'=> $dataProvider,
			'columns' => $gridColumns,
		]);
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



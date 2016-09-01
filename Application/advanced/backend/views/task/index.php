<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Task', ['value'=>Url::to('index.php?r=task/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
	
	<?php
	Modal::begin([
		'id' => 'modal',
		'size'=>'modal-lg',
	]);
	
	echo "<div id='modalContent'></div>";
	
	Modal::end();
	?>
	
	<?php
		$gridColumns = [
			'id',
			'name',
			'category',
			'course_id',
			'student_id',

		];
		
		echo ExportMenu::widget([
			'dataProvider'=> $dataProvider,
			'columns' => $gridColumns,
		]);
	?>
	
	<?php Pjax::begin(['id'=>'taskGrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'category',
            //'course_id',
            //'student_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>



<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel common\models\GradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Grade', ['value'=>Url::to('index.php?r=grade/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
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
			'date',
			'subject',
			'homework',
			'exercise',
			'quiz',
			'grade_final',
			'attendance',
			'student_id',
			'course_id',

		];
		
		echo ExportMenu::widget([
			'dataProvider'=> $dataProvider,
			'columns' => $gridColumns,
		]);
	?>
	
	<?php Pjax::begin(['id'=>'gradeGrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date',
            'subject',
            'homework',
            'exercise',
            // 'quiz',
            // 'grade_final',
            // 'attendance',
            // 'student_id',
            // 'course_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

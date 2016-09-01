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


<div class="course-index">

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pjax'=>true,
		'export'=>false,
        'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'subject',
           
        ],
    ]); ?>
</div>



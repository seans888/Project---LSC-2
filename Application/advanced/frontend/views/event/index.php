<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
#w0{
	background:transparent;
}
</style>

<div class="event-index">

    <center><h1><?= Html::encode($this->title) ?></h1></center>
	

	<?php
		Modal::begin([
			'header' => '<h4>Event</h4>',
			'id' => 'modal',
			'size'=>'modal-lg',
		]);
		
		echo "<div id='modalContent'></div>";
		
		Modal::end();
	?>
	
	<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
	));
     ?>
</div>

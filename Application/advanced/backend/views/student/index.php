<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
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
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Student',['value'=>Url::to('index.php?r=student/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
	
	<?php
	Modal::begin([
		'id' => 'modal',
		'size'=>'modal-lg',
	]);
	
	echo "<div id='modalContent'></div>";
	
	Modal::end();
	?>
	
	<?php Pjax::begin(['id'=>'studentGrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'rowOptions'=>function($model){
				if($model->status == 'active')
				{
					return ['class'=>'success']; 
				}else if($model->status == 'inactive')
				{
					return ['class'=>'danger'];
				}
			},
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'password',
            'lastname',
            'firstname',
            // 'middlename',
            // 'nickname',
            // 'gender',
            // 'age',
            // 'email_address:email',
            // 'contact_number',
            // 'address',
            // 'school',
            // 'school_address',
            // 'guardian_name',
            // 'date_of_registration',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

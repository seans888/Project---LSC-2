<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sidenav">
	<a href="http://localhost/advanced/backend/web/index.php?r=task" target = "_self">Task</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=course">Course</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=student">Student</a>
	<a href="#">Calendar</a>
	<a href="http://localhost/advanced/backend/web/index.php?r=grade">Grade</a>
	<a href="#">Message</a>
</div>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Employee',['value'=>Url::to('index.php?r=task/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
	
	<?php
	Modal::begin([
		'id' => 'modal',
		'size'=>'modal-lg',
	]);
	
	echo "<div id='modalContent'></div>";
	
	Modal::end();
	?>
	
	<?php Pjax::begin(['id'=>'employeeGrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            'lastname',
            'employee_position',
            // 'firstname',
            // 'middlename',
            // 'gender',
            // 'age',
            // 'contact_number',
            // 'email_address:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

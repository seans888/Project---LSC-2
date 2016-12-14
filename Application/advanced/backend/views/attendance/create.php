<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Attendance */

$this->title = 'Create Attendance';
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-create">

    <h1><?= Html::encode($this->title) ?></h1>
	 <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	    <p>
        <?php
        if(Yii::$app->user->can('check-attendance')){
            echo Html::a('Create Attendance', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

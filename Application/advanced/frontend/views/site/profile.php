<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
//$this->params['breadcrumbs'][] = $this->title;
?><br/>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1><br/>

    <h2><b>ID: </b> <?php echo Yii::$app->user->identity->id ?></h2>
    <div class="col-sm-12">
        <h3><b>Username: </b> <?php echo Yii::$app->user->identity->username ?></h3>
    </div>

    <div class="col-sm-4">
        <h3><b>First name: </b> <?php echo Yii::$app->user->identity->first_name ?></h3>
    </div>

    <div class="col-sm-4">
        <h3><b>Middle name: </b> <?php echo Yii::$app->user->identity->middle_name ?></h3>
    </div>

    <div class="col-sm-4">
        <h3><b>Last name: </b> <?php echo Yii::$app->user->identity->last_name ?></h3>
    </div>

    <h2> <?php echo Yii::$app->user->identity->home_address ?><br/><b>Address </b></h2>


</div>

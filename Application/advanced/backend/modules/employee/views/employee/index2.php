<?php

/* @var $this yii\web\View */

$this->title = 'employee';
?>

<div class="employee-default-index"><br><br><br>

    <center><h3><b>First Name:</b> <?php echo Yii::$app->user->identity->first_name ?></h3>
    <h3><b>Middle Name:</b> <?php echo Yii::$app->user->identity->middle_name ?></h3>
    <h3><b>Last Name:</b> <?php echo Yii::$app->user->identity->last_name ?></h3>
    <h3><b>Email: </b> <?php echo Yii::$app->user->identity->email ?></h3>
    <h3><b>Home address:</b> <?php echo Yii::$app->user->identity->home_add ?></h3>
    <h3><b>Contact number:</b> </h3><br><br><br><br><br>
    <h1><b><?php echo Yii::$app->user->identity->employee_type ?></b></h1></center>
</div>

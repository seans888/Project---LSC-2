<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
//$this->params['breadcrumbs'][] = $this->title;
?><br/><br/><br/>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	<table border="3" align="center">
	<tr>

    <th width="300px" bgcolor="#B3C6D8"><h3><b>ID: </b></th> <td><h4><?php echo Yii::$app->user->identity->id ?></h4></td>
	</tr><tr>
    <th width="300px" bgcolor="#B3C6D8"><h3><b>Username: </b></th> <td><h4><?php echo Yii::$app->user->identity->username ?></h4></th>
	</tr><tr>
    <th width="300px" bgcolor="#B3C6D8"><h3><b>First name: </b></th> <td><h4><?php echo Yii::$app->user->identity->first_name ?></h4></th>
    </tr><tr>
	<th width="300px" bgcolor="#B3C6D8"><h3><b>Middle name: </b></th> <td><h4><?php echo Yii::$app->user->identity->middle_name ?></h4></th>
	</tr><tr>
    <th width="300px" bgcolor="#B3C6D8"><h3><b>Last name: </b></th> <td><h4><?php echo Yii::$app->user->identity->last_name ?></h4></th>
	</tr><tr>
	<th width="300px" bgcolor="#B3C6D8"><h3><b>Address: </b></th> <td><h4><?php echo Yii::$app->user->identity->home_address ?></h4></th>
	</tr></table>
	<table border="3" align="center" width="600px">
	<td><h3 align="center"><a href=""><h2>My Schedule</h2></a></td>
	</tr>
	</table>

</div>

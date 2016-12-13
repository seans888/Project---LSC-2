<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
//$this->params['breadcrumbs'][] = $this->title;
?><br/><br/><br/>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	<table border="1" align="center">
	<tr>

    <th width="300px" bgcolor="#B3C6D8"><h4><b>ID: </b></th> <td width="300px"><h4><?php echo Yii::$app->user->identity->id ?></h4></td>
	</tr><tr>
    <th width="300px" bgcolor="#B3C6D8"><h4><b>Username: </b></th> <td width="300px"><h4><?php echo Yii::$app->user->identity->username ?></h4></td>
	</tr><tr>
    <th width="300px" bgcolor="#B3C6D8"><h4><b>First name: </b></th> <td width="300px"><h4><?php echo Yii::$app->user->identity->first_name ?></h4></td>
    </tr><tr>
	<th width="300px" bgcolor="#B3C6D8"><h4><b>Middle name: </b></th> <td width="300px"><h4><?php echo Yii::$app->user->identity->middle_name ?></h4></td>
	</tr><tr>
    <th width="300px" bgcolor="#B3C6D8"><h4><b>Last name: </b></th> <td width="300px"><h4><?php echo Yii::$app->user->identity->last_name ?></h4></td>
	</tr><tr>
	<th width="300px" bgcolor="#B3C6D8"><h4><b>Address: </b></th> <td width="300px"><h4><?php echo Yii::$app->user->identity->home_address ?></h4></td>
	</tr></table>
	<table border="1" align="center" width="600px">
	<td><h2 align="center"><a href="http://localhost/advanced/frontend/web/index.php?r=schedule">My Schedule</h2></a></td>
	</tr>
	</table>
	

</div>

<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'employee';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div data-scroll-reveal="enter from the bottom after 0.2s" >
<div class="site-about">
<div class="employee-default-index"><br><br><br>
<table class = "table1" border="0" width="700px" bgcolor="eee" align="center">
	<tr class="tr1">
    <th class="th1" width="800px" bgcolor="#B3C6D8"><h4><b>First Name: </b></th> <td class="td1" width="1200px" align="center" bgcolor="#B3C6D8"><h4> <?php echo Yii::$app->user->identity->first_name ?></h3></td>
	</tr>
    <th class="th1" width="600px"><h4><b>Middle Name: </b></th> <td class="td1" width="600px" align="center"><h4> <?php echo Yii::$app->user->identity->middle_name ?></h3></td>
	</tr>
	<th class="th1" width="300px" bgcolor="#B3C6D8"><h4><b>Last name: </b></th> <td class="td1" width="300px" align="center" bgcolor="#B3C6D8"><h4><?php echo Yii::$app->user->identity->last_name ?></h4></td>
   </tr>
   <th class="th1" width="300px"><h4><b>Email: </b></th> <td class="td1" width="300px" align="center"><h4><?php echo Yii::$app->user->identity->email ?></h3></td>
    </tr>
	<th class="th1" width="300px" bgcolor="#B3C6D8"><h4><b>Home Address: </b></th> <td class="td1" width="300px" align="center" bgcolor="#B3C6D8"><h4><?php echo Yii::$app->user->identity->home_address ?></h3></td>
	</tr>
    <th class="th1" width="300px"><h4><b>Contact Number: </b></th> <td class="td1" width="300px" align="center"><h4> <?php echo Yii::$app->user->identity->contact_number ?></h3></td>
	</tr></table>

</div>
</div>
</div>

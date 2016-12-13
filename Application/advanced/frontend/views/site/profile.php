<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
//$this->params['breadcrumbs'][] = $this->title;
?><br/><br/><br/>
<div data-scroll-reveal="enter from the bottom after 0.2s" >
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	
	<center><br>
	<div class="col-xs-7" >
	<table class = "table1" border="0" width="700px" bgcolor="eee">
	<tr class="tr1">
    <th class="th1" width="800px" bgcolor="#B3C6D8"><h4><b>ID: </b></th> <td class="td1" width="1200px" align="center"><h4><?php echo Yii::$app->user->identity->id ?></h4></td>
	</tr><tr class="tr1">
    <th class="th1" width="600px" bgcolor="#B3C6D8"><h4><b>Username: </b></th> <td class="td1" width="600px" align="center"><h4><?php echo Yii::$app->user->identity->username ?></h4></td>
	</tr><tr class="tr1">
    <th class="th1" width="300px" bgcolor="#B3C6D8"><h4><b>First name: </b></th> <td class="td1" width="300px" align="center"><h4><?php echo Yii::$app->user->identity->first_name ?></h4></td>
    </tr><tr class="tr1">
	<th class="th1" width="300px" bgcolor="#B3C6D8"><h4><b>Middle name: </b></th> <td class="td1" width="300px" align="center"><h4><?php echo Yii::$app->user->identity->middle_name ?></h4></td>
	</tr><tr class="tr1">
    <th class="th1" width="300px" bgcolor="#B3C6D8"><h4><b>Last name: </b></th> <td class="td1" width="300px" align="center"><h4><?php echo Yii::$app->user->identity->last_name ?></h4></td>
	</tr><tr class="tr1">
	<th class="th1" width="300px" bgcolor="#B3C6D8"><h4><b>Address: </b></th> <td class="td1" width="300px" align="center"><h4><?php echo Yii::$app->user->identity->home_address ?></h4></td>
	</tr></table>
	</center>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                   <div class="panel-group" id="accordion">
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.5s">
                            <div class="panel-heading" >
                                <h4 class="panel-title">
                                    <a href="http://localhost/advanced/frontend/web/index.php?r=schedule">
                                  <strong>My Schedule</strong>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.7s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="http://localhost/advanced/frontend/web/index.php?r=grades">
                                      <strong>My Grades </strong> 
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.9s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="http://localhost/advanced/frontend/web/index.php?r=attendance">
                                        <strong>My Attendance</strong>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
<!--<div class="col-xs-5" align="right">
<table border="1"  width="300px">
	<td bgcolor="#eee"><h4 align="center" >Activities</h4><br>
	<h4 align="center"><a href="http://localhost/advanced/frontend/web/index.php?r=schedule">My Schedule</h4></a>
	<hr class="hr1" width="200px" "#B3C6D8">
	<h4 align="center"><a href="http://localhost/advanced/frontend/web/index.php?r=grades">My Grades</h4></a>
	<hr width="200px">
	<h4 align="center"><a href="http://localhost/advanced/frontend/web/index.php?r=attendance">My Attendance</h4></a>
	</td>
	</table>
	</div>-->

</div>

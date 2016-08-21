<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
	.btnAll {
  background: #3997d1;
  background-image: -webkit-linear-gradient(top, #3997d1, #1f5f87);
  background-image: -moz-linear-gradient(top, #3997d1, #1f5f87);
  background-image: -ms-linear-gradient(top, #3997d1, #1f5f87);
  background-image: -o-linear-gradient(top, #3997d1, #1f5f87);
  background-image: linear-gradient(to bottom, #3997d1, #1f5f87);
  -webkit-border-radius: 8;
  -moz-border-radius: 8;
  border-radius: 8px;
  font-family: Arial;
  color: #ffffff;
  font-size: 25px;
  padding: 10px 20px 10px 20px;
  border: solid #1f628d 2px;
  text-decoration: none;
}

.btnAll:hover {
  background: #389ede;
  background-image: -webkit-linear-gradient(top, #389ede, #2774a8);
  background-image: -moz-linear-gradient(top, #389ede, #2774a8);
  background-image: -ms-linear-gradient(top, #389ede, #2774a8);
  background-image: -o-linear-gradient(top, #389ede, #2774a8);
  background-image: linear-gradient(to bottom, #389ede, #2774a8);
  text-decoration: none;
}
</style>

<div class="site-index">

    <div class="jumbotron">

        <a class="btnAll" href="http://localhost/advanced/backend/web/index.php?r=course">Course</a><br><br>
		<a class="btnAll" href="http://localhost/advanced/backend/web/index.php?r=student">Student</a><br><br>
		<a class="btnAll" href="http://localhost/advanced/backend/web/index.php?r=schedule">Schedule</a><br><br>
		<a class="btnAll" href="http://localhost/advanced/backend/web/index.php?r=task">Task</a><br><br>
		<a class="btnAll" href="http://localhost/advanced/backend/web/index.php?r=grade">Grade</a><br><br>
		<a class="btnAll" href="http://localhost/advanced/backend/web/index.php?r=employee">Employee</a><br><br>
    </div>

    
</div>

<?php

/* @var $this yii\web\View */

$this->title = 'LSC LMS';
?>
<link href="/advanced/frontend/web/css/site.css" rel="stylesheet">

<div class="site-index">
	<div class="jumbotron">
        <div  class="tag-line" >
            <div class="container">
                <div class="row  text-center">
                    <div class="col-lg-12  col-md-12 col-sm-12">
                        <!--LOGO-->
						<div class="span3">
                            <a class="brand" href="#">
                                <img src="http://i1044.photobucket.com/albums/b444/jgtadeo/Loyola-Student-Center%201_zpsbbvbqnsv.png" width="100" height="60"/>
                            </a>
                        </div>

                        <!-- /LOGO -->
                        <h2 data-scroll-reveal="enter from the bottom after 0.1s" >
                            LOYOLA STUDENT CENTER<br/>
							<i class="fa fa-mortar-board fa-lg"></i>  Learning Management System  <i class="fa fa-mortar-board fa-lg"></i> </h2>
					</div>
                </div>
            </div>
        </div>
      
        <!--HOME SECTION TAG LINE END-->
		<div id="features-sec" class="container set-pad" >
			<div class="row text-center">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2"></div>
            </div>
            <!--/.HEADER LINE END-->
			<div class="row" >
				<hr class="line">
				<section class="module-body container-fluid row col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<!--CALENDAR[-->
					<section class="module col-md-3 col-sm-6">
						<a href="calendar.php">
							<i class="fa fa-calendar fa-lg"  style="font-size:50px"></i>
							<div class="module-content">
								<div class="module-header"></div>
								<div class="module-details text-center">
									<center><h4><b>CALENDAR</b></h4>
										<p><h5>Calendar viewer provides all the notification including events, assignments and exercises.</h5></p></center>
								
								</div>
							</div>
						</a>
					</section>
					<!--COURSE-->
					<section class="module col-md-3 col-sm-6">
						<a href="course.php">
							<i class="glyphicon glyphicon-list-alt fa-lg"  style="font-size:37px" ></i>
							<div class="module-content">
								<div class="module-header"></div>
								<div class="module-details text-center">
									<h4><b>COURSE</b></h4>
									<p><h5>Course viewer provides all tasks (assignments and exercies) on each subjects of all enrolled courses. </h5></p>
									
								</div>
							</div>
						</a>
					</section>
					<!--GRADES-->
					<section class="module col-md-3 col-sm-6">
						<a href="grades.php">
							<i class="fa fa-trophy fa-lg" aria-hidden="true" style="font-size:50px"></i>
							<div class="module-content">
								<div class="module-header"></div>
								<div class="module-details text-center">
									<h4><b>GRADES</b></h4>
									<p><h5>Grades viewer provides all the grades from the exercises and assignments results.</h5></p>	
								</div>
							</div>
						</a>
					</section>
					<!--ATTENDANCE-->
					<section class="module col-md-3 col-sm-6">
						<a href="attendance.php">
							<i class="fa fa-check-square-o fa-lg"  style="font-size:50px" ></i>
							<div class="module-content">
								<div class="module-header"></div>
								<div class="module-details text-center">
								<center>
									<h4><b>ATTENDANCE</b></h4>
									<p><h5>Attendance viewer provides the attendance report.</h5></center></p>
								
								</div>
							</div>
						</a>
					</section>
					<footer class='container-fluid nav navbar-inverse navbar-fixed-bottom'></footer>
				</section>
			</div>
		</div>
	</div>
</div>

</body>
</html>



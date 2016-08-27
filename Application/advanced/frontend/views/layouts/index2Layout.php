<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\Index2Asset;
use common\widgets\Alert;


Index2Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>4
	

</head>
<style>
body{
	background: linear-gradient(to right, #aebef6, #eaedfb, #aebef6);
	overflow:hidden;
}
.navbar{
	background:#364783;
	border-style: solid;
    border-bottom: 1px solid black;
	height: 50px;
	border-radius:0px;
}
#btn {
  background: #2d2963;
  background-image: -webkit-linear-gradient(top, #2d2963, #534d9e);
  background-image: -moz-linear-gradient(top, #2d2963, #534d9e);
  background-image: -ms-linear-gradient(top, #2d2963, #534d9e);
  background-image: -o-linear-gradient(top, #2d2963, #534d9e);
  background-image: linear-gradient(to bottom, #2d2963, #534d9e);
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  font-family: Arial;
  color: #ffffff;
  font-size: 25px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

#btn:hover {
  background: #8a85c7;
  background-image: -webkit-linear-gradient(top, #8a85c7, #b59eeb);
  background-image: -moz-linear-gradient(top, #8a85c7, #b59eeb);
  background-image: -ms-linear-gradient(top, #8a85c7, #b59eeb);
  background-image: -o-linear-gradient(top, #8a85c7, #b59eeb);
  background-image: linear-gradient(to bottom, #8a85c7, #b59eeb);
  text-decoration: none;
}

</style>


<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'LSC Learning Management System',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ], 	
    ]);
    $menuItems = [
        /*['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],*/
    ];
    if (Yii::$app->user->isGuest) {
        /*$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];*/
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
	

    
</div>
<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://i1044.photobucket.com/albums/b444/jgtadeo/LSC%20Pictures/dsc03926_zpsz4gbowq2.jpg');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://i1044.photobucket.com/albums/b444/jgtadeo/LSC%20Pictures/dsc03918_zps0ytp5wvh.jpg');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://i1044.photobucket.com/albums/b444/jgtadeo/LSC%20Pictures/dsc03922_zps2mjracno.jpg');"></div>
                <div class="carousel-caption">
                   
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
	<center><div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Loyola Student Center</h1>
				<h2>Learning Management System</h2>
                <!--<p>The background images for the slider are set directly in the HTML using inline CSS. The rest of the styles for this template are contained within the <code>half-slider.css</code>file.</p>-->
				
            </div>
			<?= $content ?>
        </div>
		<br><br><br>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; Loyola Student Center <?= date('Y') ?></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
        
    </div></center>
	



<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Loyola Student Center <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>-->

<!-- jQuery -->
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

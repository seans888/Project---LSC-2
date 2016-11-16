<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- FLEXSLIDER CSS -->
    <link href="css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    <link href="css/site.css" rel="stylesheet" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="navbar navbar-inverse navbar-fixed-top" id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="logo-custom" src="img/logo180-50.png" alt=""  /></a>
        </div>

        <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-right">
                
				<?php if
                (Yii::$app->user->isGuest){
                    echo
                        '<li><a href="'.Url::to(['site/signup']).'">SIGN UP </a></li>'
						
                    ;} ?>
					
					<?php if
                (Yii::$app->user->isGuest){
                    echo
                        '<li><a href="'.Url::to(['site/login']).'">SIGN IN </a></li>'
						
                    ;} ?>
                <?php if
                (!Yii::$app->user->isGuest){
                    echo
                        '<li><a href="'.Url::to(['site/logout']).'">LOGOUT ('.Yii::$app->user->identity->username.')</a></li>'
						
                    ;} ?>
            </ul>
        </div>
    </div>
</div><br><br>

</div>
<div class="container">
    <div class="row text-center">
        <div class="col-lg-12  col-md-12 col-sm-12">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

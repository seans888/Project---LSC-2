<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;

DashboardAsset::register($this);
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

</head>

<body class="skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
    <header class="main-header">
        <a href="index.php" class="logo">  <!-- Logo -->
            <span class="logo-mini"><b>LSC</b></span> <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-lg"><b>LSC</b> LMS</span> <!-- logo for regular state and mobile devices -->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!--<li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                    </li>-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/johanna.jpg" class="user-image" alt="User Image">
                            <?php
                                echo
                                '<span class="hidden-xs">'.Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name.'</span>';
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="img/johanna.jpg" class="img-circle" alt="User Image">
                                <?php echo
                                '<p>'.Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name.'
                                <small>'.Yii::$app->user->identity->email.'</small>
                                </p>' ?>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="http://localhost/advanced/backend/web/index.php?r=employee/employee" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <?php if (!Yii::$app->user->isGuest){
                                    echo
                                        '<div class="pull-right">
                                            <a href="'.Url::to(['site/logout']).'" class="btn btn-default"> 
                                            Logout ('. Yii::$app->user->identity->username . ') </a>
                                        </div>'; }?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/johanna.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <?php echo
                        '<p>'.Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name.'</p>'
                    ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="index.php?r=student">
                        <i class="fa fa-users"></i> <span>Students</span>
                        <!--<span class="pull-right-container">
                            <small class="label pull-right bg-green">View</small>
                        </span>-->
                    </a>
                </li>
                <li>
                    <a href="index.php?r=employee">
                        <i class="fa fa-users"></i> <span>Employees</span>
                        <!--<span class="pull-right-container">
                            <small class="label pull-right bg-green">View</small>
                        </span>-->
                    </a>
                </li>
                <li>
                    <a href="index.php?r=ann-calendar">
                        <i class="fa fa-calendar-check-o"></i> <span>Calendar</span>
                        <!--<span class="pull-right-container">
                            <small class="label pull-right bg-green">View</small>
                        </span>-->
                    </a>
                </li>
                <li>
                    <a href="index.php?r=course">
                        <i class="fa fa-book"></i> <span>Courses</span>
                        <!--<span class="pull-right-container">
                            <small class="label pull-right bg-green">View</small>
                        </span>-->
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <!--<li class="active">Dashboard</li>-->
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css', //ok
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css', //ok
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css', //ok
        'css/AdminLTE.min.css', //ok
        'css/_all-skins.min.css', //ok
        'css/blue.css', //ok
        'css/site.css', //ok
        /*'css/morris.css',
        'css/jquery-jvectormap-1.2.2.css',
        'css/datepicker3.css',
        'css/daterangpicker.css',
        'css/bootstrap3-wysihtml5.min.css',*/
    ];
    public $js = [
        'js/bootstrap.min.js',  //ok
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js', //ok
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js', //ok
        'js/jquery.sparkline.min.js', //ok
        'js/jquery.slimscroll.min.js', //ok
        'js/fastclick.js',   //ok
        'js/app.min.js', //ok
        'js/dashboard.js', //ok
        /*'js/jquery-jvectormap-1.2.2.min.js',
        'js/jquery-jvectormap-world-mill-en.js',
        'ja/jquery.knob.js',
        'js/daterangepicker.js',
        'js/bootstrap-datepicker.js',
        'js/bootstrap3-wysihtml5.all.min.js',
        'js/demo.js',
        'js/morris.js',*/
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/bootstrap.min.css',
        'css/site.css',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
		'css/AdminLTE.min.css',
		'css/_all-skins.min.css',
		'css/blue.css',
		'css/morris.css',
		'css/jquery-jvectormap-1.2.2.css',
		'css/datepicker3.css',
		'css/daterangepicker.css',
		'css/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
		'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

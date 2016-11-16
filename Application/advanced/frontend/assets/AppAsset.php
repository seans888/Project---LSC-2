<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootsrtap2.css',
        'css/font-awesome.min.css',
        'css/flexslider.css',
        'style.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,700,300',
    ];
    public $js = [
        'js/jquery-1.10.2.js',
        'js/bootstrap.js',
        'js/jquery.flexslider.js',
        'js/scrollReveal.js',
        'js/jquery.easing.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

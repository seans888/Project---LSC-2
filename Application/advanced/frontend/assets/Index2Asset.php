<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Index2Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		
        //'css/index2Site.css',
		'css/bootstrap.min.css',
		'css/half-slider.css',
		'css/bootstrap.css'
    ];
    public $js = [
		'js/main.js',
		'js/jquery.js',
		'js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

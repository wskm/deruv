<?php

namespace admin\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'themes/default/css/admin.css',
    ];
    public $js = [
        'js/lib.min.js',
    ];
    
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
            
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

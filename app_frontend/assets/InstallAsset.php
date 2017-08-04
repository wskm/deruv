<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class InstallAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
	
    public $css = [
        //'css/site.css',
    ];
	
    public $js = [
		
    ];
	
	public $jsOptions = [
		'position' => \yii\web\View::POS_HEAD,
    ];
	
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

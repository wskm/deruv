<?php

namespace frontend\assets;

/**
 * Main frontend application asset bundle.
 */
class JqueryAsset extends \yii\web\AssetBundle
{

    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

}

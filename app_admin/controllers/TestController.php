<?php
namespace admin\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{
   
    public function actionIndex()
    {
        echo '';
        echo \wskm\test\Test::Hi();
        echo \Wskm::t('xxx');
        echo \Yii::t('admin', 'test');

        \Yii::$app->language = 'en-US';

        //new \admin\components\TranslationEventHandler();  //找不到这个类
        echo \Yii::t('yii', 'Home');
        echo \Yii::t('admin', 'test');
        echo \Yii::t('admin233', 'testxxxxxgfgg 3xxxxxxxxxxxx');
    }
}

<?php

namespace wskm\rest;

use yii\web\Response;
use yii\rest\ActiveController as YiiRest;

class ActiveController extends YiiRest
{
    public function beforeAction($action)
    {
        $this->load();
        return parent::beforeAction($action);
    }

    public function load()
    {
        
    }
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats'] = ['application/json' => Response::FORMAT_JSON];
        return $behaviors;
    }
    
    public function getUser($isthrow = true)
    {
        return \Wskm::getUser($isthrow);
    }

    public function isLogin()
    {
        return !Yii::$app->user->isGuest;
    }
}

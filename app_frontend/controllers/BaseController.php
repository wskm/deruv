<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
	public function beforeAction($action)
    {
        $this->load();
        return parent::beforeAction($action);
    }
    
    public function load()
    {
    }
    
    public function assign($key, $val)
    {
        $this->getView()->params[$key] = $val;
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

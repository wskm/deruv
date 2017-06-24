<?php
namespace admin\controllers;

use Yii;
use yii\web\Controller;
//use yii\filters\VerbFilter;

class AdminController extends Controller
{
    public function beforeAction($action)
    {
		$this->assign('siteNav', ucfirst($action->controller->id));
		
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

	public function getUser()
	{
		return \Wskm::getUser();
	}
    
}

<?php
namespace admin\controllers;

use Yii;
use wskm\web\Controller;
//use yii\filters\VerbFilter;

class CoreController extends Controller
{
    public function beforeAction($action)
    {
		$this->assign('siteNav', ucfirst($action->controller->id));
		
        return parent::beforeAction($action);
    }
    
}

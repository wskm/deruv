<?php
namespace wskm\web;

use Yii;

class Controller extends \yii\web\Controller
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

    public function goReferer()
    {
        $url = Yii::$app->request->getReferrer();
        if (!$url) {
            return $this->goBack();
        }
        return $this->redirect($url);
    }

    public function flash($msg, $iserror = true)
    {
        Yii::$app->session->addFlash(true ? 'danger' : 'success', $msg);
    }
    
    public function session($key, $value = '')
    {
        if ($value) {
            Yii::$app->session[$key] = $value;
            return;
        }
        
        return Yii::$app->session[$key];
    }
}

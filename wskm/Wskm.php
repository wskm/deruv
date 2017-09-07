<?php

//use yii\helpers\Url;
use wskm\web\Url;

class Wskm
{

    public static $version = '0.9';

    public static function get($name = null, $defaultValue = null)
    {
        return Yii::$app->request->get($name, $defaultValue);
    }

    public static function post($name = null, $defaultValue = null)
    {
        return Yii::$app->request->post($name, $defaultValue);
    }

    public static function session($name, $value = null)
    {
        if ($value) {
            Yii::$app->session[$name] = $value;
            return true;
        }
        return Yii::$app->session[$name];
    }

    public static function getUser($isthrow = true)
    {
        $user = Yii::$app->user->identity;
        if (!$user && $isthrow) {
            if (Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'error' => \Wskm::t('Login Required', 'yii'),
                ];
            }

            throw new \yii\web\HttpException(500, \Wskm::t('Login Required', 'yii'));
        }

        return $user;
    }

    public static function t($message, $cate = 'app', $params = [], $language = null)
    {
        return Yii::t($cate, $message, $params, $language);
    }

    public static function url($route = '', $scheme = false)
    {
        if (!is_array($route)) {
            return self::getWebUrl().\yii\helpers\Url::to($route);
        }

        $url = null;
        if (defined('IN_ADMIN') && IN_ADMIN) {
            $url = Url::getSingle();
            $url->scriptUrl = self::getWebUrl();

            if (\service\Setting::getConf('sys', 'enablePrettyUrl')) {
                $url->baseUrl = self::getWebUrl(false);
                $url->initRules();
            }
        } else {
            $url = Yii::$app->urlManager;
        }

        if ($scheme !== false) {
            return $url->createAbsoluteUrl($route, is_string($scheme) ? $scheme : null);
        } else {
            return $url->createUrl($route);
        }
    }

    public static function viewVal($key)
    {
        $view = Yii::$app->getView();
        return isset($view->params[$key]) ? $view->params[$key] : '';
    }

    public static function getWebUrl($lastsp = true)
    {
        if (!defined('IN_ADMIN')) {
            return rtrim(Yii::$app->request->baseUrl, '/').($lastsp ? '/' : '');
        }

        $frontendUrl = \service\Setting::getParamConf('webUrl');
        if (!$frontendUrl) {
            $baseUrl = Yii::$app->request->baseUrl;
            if (!$baseUrl || $baseUrl == '/') {
                return '/';
            }

            $paths = array_slice(explode('/', $baseUrl), 0, -2);
            $paths[] = 'app_frontend';
            if (!\service\Setting::getConf('sys', 'sharedHost')) {
                $paths[] = 'web';
            }
            return implode('/', $paths).'/';
        }

        $frontendUrl = rtrim($frontendUrl, '/').($lastsp ? '/' : '');

        return $frontendUrl;
    }

    public static function getStaticUrl()
    {
        return self::getWebUrl();
    }

    public static function getUploadUrl($isabsolute = true)
    {
        $dirUrl = self::getWebUrl().'uploads/';
        if ($isabsolute) {
            return $dirUrl;
        }

        return parse_url($dirUrl)['path'];
    }

    public static function getUploadPath()
    {
        return Yii::getAlias(Yii::$app->params['uploadPath']);
    }

}

<?php

namespace wskm\web;

use \yii\web\UrlManager;

class Url extends UrlManager
{

    private static $obj;

    public static function getSingle()
    {
        if (!is_object(self::$obj)) {
            self::$obj = new Url();
        }

        return self::$obj;
    }

    public function initRules()
    {
        $this->enablePrettyUrl = true;
        $this->showScriptName = false;
    }

}

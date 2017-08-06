<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@admin', dirname(dirname(__DIR__)) . '/app_admin' );
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/app_frontend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::setAlias('@root', dirname(dirname(__DIR__)));
Yii::setAlias('@service', dirname(dirname(__DIR__)) . '/service');
Yii::setAlias('@wskm', dirname(dirname(__DIR__)) . '/wskm');

Yii::$classMap['Wskm'] = '@wskm/Wskm.php';

error_reporting(E_ALL ^ E_NOTICE);


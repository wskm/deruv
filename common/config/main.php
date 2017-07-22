<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=deruv',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
			'enableSchemaCache' => false,
        ],
		'formatter' => [
			'dateFormat' => 'yyyy-MM-dd',
			'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
			'decimalSeparator' => ',',
			'thousandSeparator' => ' ',
			//'currencyCode' => 'CNY',
		],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
			'keyPrefix' => 'deruv',
			'cachePath' => '@admin/runtime/cache',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'assetMap' => [
                //'jquery.js' => '@web/adminlte/bower_components/jquery/dist/jquery.min.js',  //yii2 jquery-pjax is old,no sup jquery3
            ],
        ],
		'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
			//'flushInterval' => 1,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'logVars' => ['_GET', '_POST', '_SESSION'],
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'yii' => [        
                    'class' => 'yii\i18n\PhpMessageSource', 
                    'basePath' => '@root/i18n' 
                ],
				'app' => [        
                    'class' => 'yii\i18n\PhpMessageSource', 
                    'basePath' => '@root/i18n' 
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@root/i18n',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        //'common' => 'common.php',
                        //'admin' => 'admin.php',
                        //'admin/error' => 'error.php',
                    ],
                    /*
                    'on beforeRequest' => function ($event) {
                        var_dump($event);exit();
                    },
                    'on missingTranslation' => ['common\models\TranslationEventHandler', 'handleMissingTranslation'],
                    */
                    
                ],
                
            ],
        ],
    ],
];

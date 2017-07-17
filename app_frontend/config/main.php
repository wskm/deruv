<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    //require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
    //require(__DIR__ . '/params-local.php')
);

if (!isset($sysConfig['frontendTheme']) || !$sysConfig['frontendTheme']) {
    $sysConfig['frontendTheme'] = 'default';
}

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
	'language' => 'zh-CN',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-dfrontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_id-dfrontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'deruv-frontend',
        ],
		'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'assetManager' => [
			//'bundles' => require(__DIR__ .DIRECTORY_SEPARATOR .(YII_ENV_PROD ? 'assets-prod.php' : 'assets-dev.php')),
			'bundles' => require(__DIR__ .DIRECTORY_SEPARATOR .'assets-prod.php'),
        ],
		'view' => [
            'theme' => [
                'basePath' => '@frontend/themes/'.$sysConfig['frontendTheme'],
                'baseUrl' => '@web/themes/'.$sysConfig['frontendTheme'],
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/'.$sysConfig['frontendTheme'],
                ],
            ],
        ],
		'urlManager' => [
			'class' => 'wskm\web\Url',
        ],
		/*
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
		 */
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];

}

return $config;
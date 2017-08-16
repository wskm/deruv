<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    //require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
    //require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-admin',
    'basePath' => dirname(__DIR__),
    'language' => 'zh-CN',
    'controllerNamespace' => 'admin\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'rest' => [
            'class' => 'common\modules\Rest',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'top-menu',
			'mainLayout' => '@app/themes/default/layouts/main.php',
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id',
                ]
            ],
            'menus' => [
            ],
        ],
    ],
	'controllerMap' => [
		 'upload' => [
            'class' => 'common\controllers\UploadController',			
		]
	 ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-dadmin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_id-dadmin', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the admin
            'name' => 'deruv-admin',
            'class' => 'yii\web\DbSession',
        ],        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'theme' => [
                'basePath' => '@admin/themes/default',
                'baseUrl' => '@web/themes/default',
                'pathMap' => [
                    '@admin/views' => '@admin/themes/default',
                ],
            ],
        ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
			'defaultRoles' => ['guest'],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
	'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
           // 'admin/*',  //add or remove allowed actions to this list
        ]
    ],
    'params' => $params,
];

if ($setting['db']) {
    $config['components']['db'] = $setting['db'];
}

if (isset($setting['adminRequest']['cookieValidationKey'])) {
    $config['components']['request']['cookieValidationKey'] = $setting['adminRequest']['cookieValidationKey'];
}

if (YII_ENV_DEV) {
    
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
		'generators' => [ 
			'crud' => [
				'class' => 'yii\gii\generators\crud\Generator', 
				'templates' => [ 
					'crud-deruv' => '@app/gii/crud', 
				] 
			] 
		], 
    ];
}

return $config;
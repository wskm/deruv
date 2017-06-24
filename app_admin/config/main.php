<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-admin',
    'basePath' => dirname(__DIR__),
    'language' => 'zh-CN',
    //timeZone version
    'controllerNamespace' => 'admin\controllers',
    'bootstrap' => ['log'],
    'modules' => [
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
        ]
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
            'enableAutoLogin' => true,
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

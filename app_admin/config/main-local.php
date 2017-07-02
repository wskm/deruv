<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zgvK0cT7xLQoLK4fjsPYEONAQSigmZrH',
        ],
    ],
];

//YII_ENV_DEV
if (YII_DEBUG) {
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

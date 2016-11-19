<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'employee' => [
            'class' => 'backend\modules\employee\Employee',
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Employee',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendUser', // unique for backend
            ]
        ],

        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],


        'session' => [
            'name' => 'PHPBACKSESSID',
            'savePath' => sys_get_temp_dir(),
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vHESTKavVDCHJBcinxhr',
            'csrfParam' => '_backendCSRF',
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
    'params' => $params,
];

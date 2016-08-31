<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=lsc_lms',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
		'authManager' => [
              'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
			  
        ],
		
		
    ],
	
	'modules' => [
			'gridview' => [ 'class' => 'kartik\grid\Module',
		],
	],
];

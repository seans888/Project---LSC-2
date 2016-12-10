<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],

    ],

    'modules' => [
        'courses' => [
            'class' => 'common\modules\courses\Course',
                'modules' => [
                    'tasks' => [
                        'class' => 'common\modules\courses\modules\tasks\Task'
                    ]
                ]
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
];

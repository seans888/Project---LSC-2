<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    'modules' => [
        'courses' => [
            'class' => 'common\modules\courses\Course',
        ],

        'tasks' => [
            'class' => 'common\modules\tasks\Quiz',
        ],
    ],

];

<?php

namespace common\modules\courses;
use yii\base\Module;

/**
 * courses module definition class
 */
class Course extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\courses\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

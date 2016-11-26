<?php

namespace backend\modules\employee;
use yii\base\Module;

/**
 * employee module definition class
 */
class Employee extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\employee\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

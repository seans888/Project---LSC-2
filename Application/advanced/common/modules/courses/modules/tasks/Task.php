<?php

namespace common\modules\courses\modules\tasks;
use Yii;
use yii\base\Module;

/**
 * tasks module definition class
 */
class Task extends Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\courses\modules\tasks\controllers';
    private $_assetsUrl;

    /**
     * @inheritdoc
     */
    public function init()
    {

    }

    public function getAssetsUrl()
    {
        if($this->_assetsUrl === null)
        {
            $assets = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'web';
            $this->_assetsUrl = Yii::$app->getAssetManager()->publish($assets, array('beforeCopy' =>
                function($from, $to)
                {
                    if(strpos($from, '.directory') < 1)
                    {
                        return $from;
                    }
                }
            ));
        }
        return $this->_assetsUrl[1];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 12/12/2016
 * Time: 9:52 PM
 */
use yii\helpers\Html;

?>

<div class="quiz-answer">
    <?php

    echo $model->title . '&nbsp;&nbsp;';
    if($model->user_answer === $model->answer)
        echo Html::img(Yii::$app->controller->module->assetsUrl . '/image/ok.png', array('style' => 'vertical-align:middle;'));
    else
        echo Html::img(Yii::$app->controller->module->assetsUrl . '/image/wrong.png', array('style' => 'vertical-align:middle;'));
    ?>
    <br/>
    <span>
        <?php
            foreach($model->answers as $key => $value):
        ?>
            <?php
            if($model->answer == $key):
                ?>
                <b><?= $value ?></b>
                <?php
            elseif($model->answer != $key && $model->user_answer == $key):
                ?>
                <del><?= $value ?></del>
                <?php
            else:
                ?>
                <?= $value ?>
                <?php
            endif;
            ?>
            <br/>
            <?php
        endforeach;
        ?>
    </span>
</div>

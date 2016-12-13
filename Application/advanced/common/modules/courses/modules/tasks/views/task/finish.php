<?php

/* @var $this yii\web\View */
use common\modules\courses\modules\tasks\controllers\TaskController;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $searchModel common\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'End Quiz';
$this->params['breadcrumbs'][] = $this->title;


$scriptquiz ='
    $(".pagination li a").click(function(){
        var page = parseInt($(this).attr("data-page")) + 1;
        $("#page").val(page);
        $("#quiz-form").submit();
        return false;
    });
';

$stylequiz = '
    .quiz-answer
    {
          background:url(' . Yii::$app->controller->module->assetsUrl . '/image/strip-line.gif);
          border:1px solid black;
          margin:10px;
          padding:10px;
          text-align:center;
          font-size:20px;
    }
    .quiz-answer label
    {
	display:block;
    }
    
    .graphcont {
        padding-top:10px;
        color:#000;
        font-weight:700;
        float:left
    }
     
    .graph {
        border:1px solid black;
        float:left;
        background-image:url(' . Yii::$app->controller->module->assetsUrl . '/image/bargraph2.gif);
        background-size: 100% 100%;
        position:relative;
        width:100%;
        padding:0px;
        margin-left:auto;
        margin-right:auto;
    }
     
    .graph .bar {
        display:block;
        position:relative;
        background-image:url(' .Yii::$app->controller->module->assetsUrl . '/image/bargraph.gif);
        background-size: 100% 100%;
        border-right:#538e02 1px solid;
        text-align:center;
        color:#fff;
        font-size:20px;
        line-height:1.9em
    }
     
    .graph .bar span {
        position:absolute;
        left:1em
    }
    
    .items{
        text-align:center;
    }
    .list-view .pager
    {
        margin: 5px 0 0 0;
        text-align: center;
    }
    ';

    $this->registerCss($stylequiz);
    $this->registerJs($scriptquiz, View::POS_END, 'quizjs');
    //$this->registerCssFile(Yii::app()->request->baseUrl . '/css/form.css', [], 'quizcss');

?>
<script type="text/javascript" src="/../web/quiz.js"></script>
<div style="font-size:40px;text-align:center;margin-top:20px;">
    <p>End of the test. Your score is:</p>
    <div class="graph">
        <strong class="bar" style="width:<?= $score ?>%;"><?= $score ?>%</strong>
    </div>
    <div class="clear"></div>
    <?php
    if(TaskController::MINIMUM_SCORE !== false):
        if(isset($diplomaForm) && !isset(Yii::$app->session['diplomaGot'])):
            ?>
            <div style="font-size:20px;text-align:center;padding-top:35px;" class="form">
                Congratulations, you can download your diploma!<br/><br/>
                <?php $form = ActiveForm::begin(array(
                    'id'=>'diploma-form',
                    'enableClientValidation'=>false,
                )); ?>
                <div class="row">
                    <?php
                    echo $form->field($diplomaForm, 'name')->textInput(['class' => 'inputtext','maxlength'=>40, 'autocomplete' => 'off']);
                    ?>
                </div>
                <div class="row buttons">
                    <?= Html::submitButton('Get diploma', array('class' => 'mainbutton', 'style' => 'font-size:25px;')); ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <?php
        elseif(isset(Yii::$app->session['diplomaGot'])):
            ?>
            <div style="font-size:20px;text-align:center;padding-top:35px;">
                <br/>You already got your diploma!
            </div>
            <?php
        else:
            ?>
            <div style="font-size:20px;text-align:center;padding-top:35px;">
                You didn't get <?= TaskController::MINIMUM_SCORE ?>%! You don't qualify for the diploma. Do you want to <?= Html::a('try again', array('task/start', 'task' => Yii::$app->session['task'])) ?>?
            </div>
            <?php
        endif;
    endif;
    ?>
    <div style="margin-bottom:20px;margin-top:40px;">
        <u>Correct answers</u>
    </div>
</div>
<div>
    <div style="text-align:center;">
        <?php $form = ActiveForm::begin(array(
            'id'=>'quiz-form',
            'enableClientValidation'=>false,
        ));
        ?>
        <?= Html::hiddenInput('page', '1', array('id' => 'page')); ?>
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_finish_view',
            'layout'=>'{pager}{items}{pager}',
        ]);
        ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>


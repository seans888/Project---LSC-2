<?php

use common\modules\courses\modules\tasks\controllers\TaskController;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('
    $(".task").click(function()
    {
        $("#wait").css("display", "block");
    });
    ',View::POS_END,
    'quizjs');

$this->registerCss('
    .center
    {
        text-align:center;    
    }
    
	@media all and (min-width: 650px)
	{
		#quizrules
		{
			width:550px;
		}
	}
    ')
?>
<script type="text/javascript" src="/../web/quiz.js"></script>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p style="text-align: center">
        <ul id="quizrules" style="padding:10px; margin:auto;">
    <p>You have just <?= TaskController::SECONDS_PER_QUESTIONS?> seconds to answer each question.
        <?php
        if(TaskController::MINIMUM_SCORE !== false):
        ?>
    </p>
    <p>
        If you get <?= TaskController::MINIMUM_SCORE ?>% or more, you will be able to download a diploma! <br/>
    </p>
<?php
endif;
?>
    </ul>
    </p>
    <p>
        <?php
        if(Yii::$app->user->can('add-task')){
            echo Html::a('Create more task', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p><br/>


    <?php
        foreach ($tasks as $task):
        echo Html::a($task->title . ' ( ' . $task->questionCount . ' Questions )', array("task/start", 'task' => $task->id), array('class' => 'task'));
    ?>
    <br/>
    <?php
    endforeach;
    ?>



    <div id="wait" style="top:25%;left:0%;width:100%;text-align:center;display:none;position:fixed">
        <?= Html::img(Yii::$app->controller->module->assetsUrl.'/image/loading.gif', array('style' => 'background:white;border:1px solid black;')); ?>
    </div>


</div>

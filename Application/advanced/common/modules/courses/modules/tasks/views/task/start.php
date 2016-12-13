<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 12/12/2016
 * Time: 9:01 PM
 */
use common\modules\courses\modules\tasks\controllers\TaskController;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;

$counter = "
    $(function(){
    $('#counter').countdown({
      image: '" . Yii::$app->controller->module->assetsUrl . "/image/digits.png" .  "',
      startTime: '" . gmdate("i:s", $seconds) . "',
      timerEnd: function(){
         $('#end').val('1');    
         $('#quiz-form').submit();
      },
      format: 'mm:ss'
    });
  });
  
 /*
 * jquery-counter plugin
 *
 * Copyright (c) 2009 Martin Conte Mac Donell <Reflejo@gmail.com>
 * Dual licensed under the MIT and GPL licenses.
 * http://docs.jquery.com/License
 */
 
 
 jQuery.fn.countdown = function(userOptions)
{
  // Default options
  var options = {
    stepTime: 60,
    // startTime and format MUST follow the same format.
    // also you cannot specify a format unordered (e.g. hh:ss:mm is wrong)
    format: \"dd:hh:mm:ss\",
    startTime: \"01:12:32:55\",
    digitImages: 6,
    digitWidth: 53,
    digitHeight: 77,
    timerEnd: function(){},
    image: \"" . Yii::$app->controller->module->assetsUrl . "/image/digits.png\"
  };
  var digits = [], interval;

  // Draw digits in given container
  var createDigits = function(where) 
  {
    var c = 0;
    // Iterate each startTime digit, if it is not a digit
    // we\'ll asume that it\'s a separator
    for (var i = 0; i < options.startTime.length; i++)
    {
      if (parseInt(options.startTime[i]) >= 0) 
      {
        elem = $('<div id=\"cnt_' + i + '\" class=\"cntDigit\" />').css({
          height: options.digitHeight * options.digitImages * 10, 
          float: 'left', background: 'url(\'' + options.image + '\')',
          width: options.digitWidth});
        digits.push(elem);
        margin(c, -((parseInt(options.startTime[i]) * options.digitHeight *
                              options.digitImages)));
        digits[c].__max = 9;
        // Add max digits, for example, first digit of minutes (mm) has 
        // a max of 5. Conditional max is used when the left digit has reach
        // the max. For example second \"hours\" digit has a conditional max of 4 
        switch (options.format[i]) {
          case 'h':
            digits[c].__max = (c % 2 == 0) ? 2: 9;
            if (c % 2 == 0)
              digits[c].__condmax = 4;
            break;
          case 'd': 
            digits[c].__max = 9;
            break;
          case 'm':
          case 's':
            digits[c].__max = (c % 2 == 0) ? 5: 9;
        }
        ++c;
      }
      else 
        elem = $('<div class=\"cntSeparator\"/>').css({float: 'left'})
                .text(options.startTime[i]);

      where.append(elem)
    }
  };
  
  // Set or get element margin
  var margin = function(elem, val) 
  {
    if (val !== undefined)
      return digits[elem].css({'marginTop': val + 'px'});

    return parseInt(digits[elem].css('marginTop').replace('px', ''));
  };

  // Makes the movement. This is done by \"digitImages\" steps.
  var moveStep = function(elem) 
  {
    digits[elem]._digitInitial = -(digits[elem].__max * options.digitHeight * options.digitImages);
    return function _move() {
      mtop = margin(elem) + options.digitHeight;
      if (mtop == options.digitHeight) {
        margin(elem, digits[elem]._digitInitial);
        if (elem > 0) moveStep(elem - 1)();
        else 
        {
          clearInterval(interval);
          for (var i=0; i < digits.length; i++) margin(i, 0);
          options.timerEnd();
          return;
        }
        if ((elem > 0) && (digits[elem].__condmax !== undefined) && 
            (digits[elem - 1]._digitInitial == margin(elem - 1)))
          margin(elem, -(digits[elem].__condmax * options.digitHeight * options.digitImages));
        return;
      }
      margin(elem, mtop);

      if(elem == 3)
      {
          if(margin(elem) == -4081 || margin(elem) == -3696 || margin(elem) == -3234 || margin(elem) == -2772 || margin(elem) == -2310
            || margin(elem) == -1848 || margin(elem) == -1386 || margin(elem) == -924 || margin(elem) == -462 || margin(elem) == 0)
            {
                seconds = $('#seconds').val();
                $('#seconds').val(--seconds);
                //alert($('#seconds').val());               
            }
      }
      
      if (margin(elem) / options.digitHeight % options.digitImages != 0)
        setTimeout(_move, options.stepTime);

      if (mtop == 0) digits[elem].__ismax = true;
    }
  };

  $.extend(options, userOptions);
  this.css({height: options.digitHeight, overflow: 'hidden'});
  createDigits(this);
  interval = setInterval(moveStep(digits.length - 1), 1000);
};
    ";

$scriptquiz =
    '
         $(".pagination li a").click(function(){
            var page = parseInt($(this).attr("data-page")) + 1;
            $("#page").val(page);
            $("#quiz-form").submit();
            return false;
        });       
        $(\'#submitButton\').click(function(){
            if(!confirm(\'Are you sure you want to finish the test?\'))
                return false;
            $(\'#end\').val(\'1\');                     
        })
    ';

$this->registerJs($scriptquiz, View::POS_END, 'quizjs');

$this->registerCss('
      .quiz-answer
      {
            background:url(' . Yii::$app->controller->module->assetsUrl . '/images/strip-line.gif);
            border:1px solid black;
            margin:10px;
            padding:10px;
            text-align:center;
            font-size:20px;
      }
    .cntSeparator {
        font-size: 54px;
        margin: 10px 7px;
        color: #000;
        font-family: Arial;
    }
    .desc { margin: 7px 3px; }
    .desc div {
        float: left;
        font-family: Arial;
        width: 100px;
        font-size: 13px;
        font-weight: bold;
        color: #000;
        text-align:center;
    }
    .desc div:nth-child(1)
    {
        margin-right: 40px;
    }
      
    items{
        text-align:center;
    }
    .list-view .pager
    {
        margin: 5px 0 0 0;
        text-align: center;
    }
    
    .quiz-answer label
    {
	display:block;
    }
    #submitButton
    {
        width: 200px;
        height:50px;
        margin-top:20px;
        font-weight:bold;
        font-size:20px;        
    }
');

if(TaskController::SECONDS_PER_QUESTIONS):
    $this->registerJs($counter, View::POS_END, 'counterjs');
?>

<div style="text-align:center;">
    <div style="display:inline-block;text-align:center;width:260px;margin:0 auto;vertical-align:middle;">
        <div id="counter"></div>
        <div class="desc">
            <div>Minutes</div>
            <div>Seconds</div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php
    endif;
?>

<div style="text-align:center;">
    <?php $form = ActiveForm::begin(array(
        'id'=>'quiz-form',
        'enableClientValidation'=>false,
        'action'=>Yii::$app->urlManager->createUrl('courses/tasks/task/change'),
    )); ?>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'layout'=>'{pager}{items}{pager}',
    ]);
    ?>

    <?= Html::hiddenInput('questionsLeft', $questionsLeft, array('id' => 'questionsLeft')); ?>
    <?= Html::hiddenInput('page', '1', array('id' => 'page')); ?>

    <?php
        if(TaskController::SECONDS_PER_QUESTIONS)
            echo Html::hiddenInput('seconds', $seconds, array('id' => 'seconds'));
    ?>

    <?= Html::hiddenInput('end', '0', array('id' => 'end')); ?>

    <?php
        echo Html::submitButton('End test', array('id' => 'submitButton', 'name' => 'submitButton'));
    ?>
<?php ActiveForm::end(); ?>
</div>




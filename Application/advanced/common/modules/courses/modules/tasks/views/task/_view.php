<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 12/12/2016
 * Time: 9:53 PM
 */
use yii\helpers\Html;

?>
<script type="text/javascript" src="/../web/quiz.js"></script>
<div class="quiz-answer">
    <?php
        echo $model->title;
    ?>
<br/>
<?php
echo Html::radioList($model->id, $model->user_answer, $model->answers, array('class' => 'question'));
?>
</div>
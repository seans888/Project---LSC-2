<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StudAnswer */

$this->title = 'Create Stud Answer';
$this->params['breadcrumbs'][] = ['label' => 'Stud Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stud-answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

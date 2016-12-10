<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Choice */

$this->title = 'Update Choice: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Choices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'question_id' => $model->question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="choice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AnnCalendar */

$this->title = 'Update Ann Calendar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ann Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ann-calendar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

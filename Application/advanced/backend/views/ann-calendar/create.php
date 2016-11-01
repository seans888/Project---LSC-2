<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AnnCalendar */

$this->title = 'Create Ann Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Ann Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ann-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

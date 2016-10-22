<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ClassList */

$this->title = 'Create Class List';
$this->params['breadcrumbs'][] = ['label' => 'Class Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

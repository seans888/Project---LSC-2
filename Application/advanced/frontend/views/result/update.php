<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Result */

$this->title = 'Update Result: ' . $model->feedback;
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->feedback, 'url' => ['view', 'id' => $model->feedback]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

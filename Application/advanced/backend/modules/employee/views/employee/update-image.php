<?php
/**
 * Created by PhpStorm.
 * User: johanna marisse heramia
 * Date: 19/11/2016
 * Time: 8:52 PM
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\employee\models\Employee */

$this->title = 'Update Employee: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update_image', [
        'model' => $model,
    ]) ?>

</div>
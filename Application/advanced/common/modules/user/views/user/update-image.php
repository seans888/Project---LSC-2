<?php
/**
 * Created by PhpStorm.
 * User: johanna marisse heramia
 * Date: 19/11/2016
 * Time: 3:15 PM
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\user\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update_image', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Attendance */

$this->title = $model->class_list_user_id;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'class_list_user_id' => $model->class_list_user_id, 'class_list_course_id' => $model->class_list_course_id, 'schedule_id' => $model->schedule_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'class_list_user_id' => $model->class_list_user_id, 'class_list_course_id' => $model->class_list_course_id, 'schedule_id' => $model->schedule_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'status',
            'class_list_user_id',
            'class_list_course_id',
            'schedule_id',
        ],
    ]) ?>

</div>

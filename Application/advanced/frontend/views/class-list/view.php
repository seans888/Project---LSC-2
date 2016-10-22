<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ClassList */

$this->title = $model->course_id;
$this->params['breadcrumbs'][] = ['label' => 'Class Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'course_id' => $model->course_id, 'course_employee_id' => $model->course_employee_id, 'student_id' => $model->student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'course_id' => $model->course_id, 'course_employee_id' => $model->course_employee_id, 'student_id' => $model->student_id], [
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
            'course_id',
            'course_employee_id',
            'student_id',
        ],
    ]) ?>

</div>

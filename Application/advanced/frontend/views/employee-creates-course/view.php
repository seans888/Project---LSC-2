<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeCreatesCourse */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Creates Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-creates-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'employee_id' => $model->employee_id, 'course_id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'employee_id' => $model->employee_id, 'course_id' => $model->course_id], [
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
            'employee_id',
            'course_id',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Grade */

$this->title = 'Update Grade: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'student_id' => $model->student_id, 'course_id' => $model->course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

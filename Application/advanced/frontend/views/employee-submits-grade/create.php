<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmployeeSubmitsGrade */

$this->title = 'Create Employee Submits Grade';
$this->params['breadcrumbs'][] = ['label' => 'Employee Submits Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-submits-grade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

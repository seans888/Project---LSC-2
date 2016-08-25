<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmployeeCreatesCourse */

$this->title = 'Create Employee Creates Course';
$this->params['breadcrumbs'][] = ['label' => 'Employee Creates Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-creates-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

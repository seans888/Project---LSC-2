<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClassListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Class List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->user_id), ['view', 'user_id' => $model->user_id, 'course_id' => $model->course_id]);
        },
    ]) ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            'lastname',
            'firstname',
            // 'middlename',
            // 'nickname',
            // 'gender',
            // 'age',
            // 'email_address:email',
            // 'contact_number',
            // 'address',
            // 'school',
            // 'school_address',
            // 'guardian_name',
            // 'date_of_registration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

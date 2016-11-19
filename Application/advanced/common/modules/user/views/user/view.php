<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\user\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'created_at',
            'status',
            'updated_at',
            'status_student',
            'number_of_hours',
            'review_class',
            'first_name',
            'middle_name',
            'guardian_email_address:email',
            'last_name',
            'nickname',
            'gender',
            'age',
            'contact_number',
            'home_address',
            'school',
            'school_address',
            'guardian_name',
            'relation',
            'guardian_contact_number',
            'date_of_registration',
            'image',
        ],
    ]) ?>

</div>

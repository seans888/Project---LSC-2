<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view"><br><br/>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
         if(Yii::$app->user->can('update-course')){
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
         }
        ?>

        <?php
        if(Yii::$app->user->can('delete-course'))
        {
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
		
		<?php
        if(Yii::$app->user->can('add-student-to-course')){
            echo Html::a('Enroll students to this course', ['/class-list/create'], ['class' => 'btn btn-primary']);
        }
        ?>	
        <?php
        if(Yii::$app->user->can('view-task')){
            echo Html::a('View tasks', ['/courses/tasks/task/'], ['class' => 'btn btn-primary']);
        }

        ?>
		
		<?php
		if(Yii::$app->user->can('add-task')){
			echo Html::a('Add tasks', ['/courses/tasks/task/create'], ['class' => 'btn btn-primary']);
			
		}
		?>
		
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'course_description',
            'date_created',
            'user.last_name:text:Student',
        ],
    ]) ?>

    <p>
        
        
    </p>
</div>

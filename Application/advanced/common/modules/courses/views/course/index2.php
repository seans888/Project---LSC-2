<?php
use yii\helpers\Html;
?>


<div class="courses-default-index"><br/><br/>
    <h1><?=$this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
    <p>
        <?= Html::a('Create Task', ['/courses/tasks/task/create/'], ['class' => 'btn btn-primary']) ?>

    </p>
</div>

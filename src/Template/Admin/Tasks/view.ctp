<section class="panel">
  <header class="panel-heading">
    <h3><?= h($task->name) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Name') ?></h6>
    <p><?= h($task->name) ?></p>
                <h6 class="subheader"><?= __('User') ?></h6>
    <p><?= $task->has('user') ? $this->Html->link($task->user->id, ['controller' => 'Users', 'action' => 'view', $task->user->id]) : '' ?></p>
                        <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= $this->Number->format($task->id) ?></p>
                    <h6 class="subheader"><?= __('Created') ?></h6>
    <p><?= h($task->created) ?></p>
        <h6 class="subheader"><?= __('Modified') ?></h6>
    <p><?= h($task->modified) ?></p>
                    <h6 class="subheader"><?= __('Finished') ?></h6>
    <p><?= $task->finished ? __('Yes') : __('No'); ?></p>
                <div class="btn-group">
      <?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
    </div>
  </div>

</section>

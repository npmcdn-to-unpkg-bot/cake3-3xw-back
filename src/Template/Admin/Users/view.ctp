<section class="panel">
  <header class="panel-heading">
    <h3><?= h($user->id) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Email') ?></h6>
    <p><?= h($user->email) ?></p>
                <h6 class="subheader"><?= __('Password') ?></h6>
    <p><?= h($user->password) ?></p>
                <h6 class="subheader"><?= __('Digest Pass') ?></h6>
    <p><?= h($user->digest_pass) ?></p>
                <h6 class="subheader"><?= __('Role') ?></h6>
    <p><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></p>
                        <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= $this->Number->format($user->id) ?></p>
                    <h6 class="subheader"><?= __('Created') ?></h6>
    <p><?= h($user->created) ?></p>
        <h6 class="subheader"><?= __('Modified') ?></h6>
    <p><?= h($user->modified) ?></p>
                    <div class="btn-group">
      <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
    </div>
  </div>

</section>

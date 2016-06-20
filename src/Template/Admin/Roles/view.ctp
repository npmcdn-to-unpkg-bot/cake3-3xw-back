<section class="panel">
  <header class="panel-heading">
    <h3><?= h($role->name) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Name') ?></h6>
    <p><?= h($role->name) ?></p>
                        <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= $this->Number->format($role->id) ?></p>
                        <div class="btn-group">
      <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
    </div>
  </div>

</section>
<section class="panel">
  <header class="panel-heading">
    <?= __('Related Users') ?>
  </header>
  <div class="panel-body">
    <?php if (!empty($role->users)): ?>
      <table cellpadding="0" cellspacing="0" class='table table-hover general-table'>
        <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Created') ?></th>
                    <th><?= __('Modified') ?></th>
                    <th><?= __('Email') ?></th>
                    <th><?= __('Password') ?></th>
                    <th><?= __('Digest Pass') ?></th>
                    <th><?= __('Role Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($role->users as $users): ?>
          <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->modified) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->digest_pass) ?></td>
            <td><?= h($users->role_id) ?></td>

            <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id ],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</section>

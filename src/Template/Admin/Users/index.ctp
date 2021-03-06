<section class="panel">
  <header class="panel-heading">
    <?= __('Users') ?> <small><?= $this->Paginator->counter() ?>
      <span class="tools pull-right">
        <a href="<?=$this->Url->build(["controller" => "users","action" => "add"]);?>"><i class="fa fa-plus"></i> Add</a>
      </span>
    </header>
    <div class="panel-body">
      <table class="table table-hover general-table">
        <thead>
          <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('password') ?></th>
                        <th><?= $this->Paginator->sort('digest_pass') ?></th>
                        <th><?= $this->Paginator->sort('role_id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr>
                                  <td><?= $this->Number->format($user->id) ?></td>
                                        <td><?= h($user->created) ?></td>
                                        <td><?= h($user->modified) ?></td>
                                        <td><?= h($user->email) ?></td>
                                        <td><?= h($user->password) ?></td>
                                        <td><?= h($user->digest_pass) ?></td>
                                          <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                                  <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="panel-body">
    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
      </ul>
    </div>
  </div>
</section>

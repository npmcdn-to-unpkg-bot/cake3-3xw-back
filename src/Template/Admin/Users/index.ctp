<div class="col-xs-12">
  <section class="panel panel-default">
    <header class="panel-heading">
      <?= __('Users') ?> <small><?= $this->Paginator->counter() ?>
      <span class="tools pull-right">
        <a href="<?=$this->Url->build(["controller" => "users","action" => "add"]);?>" class="btn btn-xs btn-info"><i class="fa fa-plus"></i> Add</a>
      </span>
    </header>
    <div class="panel-body">
      <div id="no-more-table" class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed">
          <thead class="cf">
            <tr>
              <th><?= $this->Paginator->sort('last_name',['label' => 'Nom']) ?></th>
              <th><?= $this->Paginator->sort('email') ?></th>
              <th><?= $this->Paginator->sort('role') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
                <td data-title="last_name"><?= h($user->last_name).' '.h($user->first_name) ?></td>
                <td data-title="email"><?= h($user->email) ?></td>
                <td data-title="role"><?= h($user->role) ?></td>
                <td data-title="actions" class="actions">
                  <div class="btn-group">
                    <?= $this->Html->link(__('Profile'), ['action' => 'profile', $user->id],['class' => 'btn btn-default btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-default btn-xs']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger btn-xs'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                  </div>
                </td>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="panel-footer">
      <div class="paginator">
        <ul class="pagination">
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
      </div>
    </div>
  </section>
</div>

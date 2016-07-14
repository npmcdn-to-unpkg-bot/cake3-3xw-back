<section class="panel">
  <header class="panel-heading">
    <?= __('Website') ?> <small><?= $this->Paginator->counter() ?>
      <span class="tools pull-right">
        <a href="<?=$this->Url->build(["controller" => "website","action" => "add"]);?>"><i class="fa fa-plus"></i> Add</a>
      </span>
    </header>
    <div class="panel-body">
      <table class="table table-hover general-table">
        <thead>
          <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('google_analytics') ?></th>
                        <th><?= $this->Paginator->sort('facebook') ?></th>
                        <th><?= $this->Paginator->sort('twitter') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($website as $website): ?>
            <tr>
                                  <td><?= $this->Number->format($website->id) ?></td>
                                        <td><?= h($website->name) ?></td>
                                        <td><?= h($website->email) ?></td>
                                        <td><?= h($website->google_analytics) ?></td>
                                        <td><?= h($website->facebook) ?></td>
                                        <td><?= h($website->twitter) ?></td>
                                <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['action' => 'view', $website->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $website->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $website->id], ['class' => 'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $website->id)]) ?>
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

<section class="panel">
  <header class="panel-heading">
    <?= __('Blocks') ?> <small><?= $this->Paginator->counter() ?>
      <span class="tools pull-right">
        <a href="<?=$this->Url->build(["controller" => "blocks","action" => "add"]);?>"><i class="fa fa-plus"></i> Add</a>
      </span>
    </header>
    <div class="panel-body">
      <table class="table table-hover general-table">
        <thead>
          <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= $this->Paginator->sort('modified') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('size') ?></th>
                        <th><?= $this->Paginator->sort('block_type_id') ?></th>
                        <th><?= $this->Paginator->sort('page_id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($blocks as $block): ?>
            <tr>
                                  <td><?= $this->Number->format($block->id) ?></td>
                                        <td><?= h($block->created) ?></td>
                                        <td><?= h($block->modified) ?></td>
                                        <td><?= h($block->name) ?></td>
                                        <td><?= h($block->size) ?></td>
                                          <td><?= $block->has('block_type') ? $this->Html->link($block->block_type->name, ['controller' => 'BlockTypes', 'action' => 'view', $block->block_type->id]) : '' ?></td>
                                            <td><?= $block->has('page') ? $this->Html->link($block->page->name, ['controller' => 'Pages', 'action' => 'view', $block->page->id]) : '' ?></td>
                                  <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['action' => 'view', $block->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $block->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $block->id], ['class' => 'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id)]) ?>
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

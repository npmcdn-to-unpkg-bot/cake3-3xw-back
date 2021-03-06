<section class="panel">
  <header class="panel-heading">
    <?= __('Block Types') ?> <small><?= $this->Paginator->counter() ?>
      <span class="tools pull-right">
        <a href="<?=$this->Url->build(["controller" => "blockTypes","action" => "add"]);?>"><i class="fa fa-plus"></i> Add</a>
      </span>
    </header>
    <div class="panel-body">
      <table class="table table-hover general-table">
        <thead>
          <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($blockTypes as $blockType): ?>
            <tr>
                                  <td><?= $this->Number->format($blockType->id) ?></td>
                                        <td><?= h($blockType->name) ?></td>
                                <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['action' => 'view', $blockType->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blockType->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blockType->id], ['class' => 'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $blockType->id)]) ?>
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

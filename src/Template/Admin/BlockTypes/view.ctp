<section class="panel">
  <header class="panel-heading">
    <h3><?= h($blockType->name) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Name') ?></h6>
    <p><?= h($blockType->name) ?></p>
                        <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= $this->Number->format($blockType->id) ?></p>
                            <h6 class="subheader"><?= __('Description') ?></h6>
    <div class='detail_text'>
      <?= $this->Text->autoParagraph(h($blockType->description)); ?>
    </div>
            <div class="btn-group">
      <?= $this->Html->link(__('Edit Block Type'), ['action' => 'edit', $blockType->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete Block Type'), ['action' => 'delete', $blockType->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $blockType->id)]) ?>
    </div>
  </div>

</section>
<section class="panel">
  <header class="panel-heading">
    <?= __('Related Blocks') ?>
  </header>
  <div class="panel-body">
    <?php if (!empty($blockType->blocks)): ?>
      <table cellpadding="0" cellspacing="0" class='table table-hover general-table'>
        <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Created') ?></th>
                    <th><?= __('Modified') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Content') ?></th>
                    <th><?= __('Size') ?></th>
                    <th><?= __('Block Type Id') ?></th>
                    <th><?= __('Page Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($blockType->blocks as $blocks): ?>
          <tr>
            <td><?= h($blocks->id) ?></td>
            <td><?= h($blocks->created) ?></td>
            <td><?= h($blocks->modified) ?></td>
            <td><?= h($blocks->name) ?></td>
            <td><?= h($blocks->content) ?></td>
            <td><?= h($blocks->size) ?></td>
            <td><?= h($blocks->block_type_id) ?></td>
            <td><?= h($blocks->page_id) ?></td>

            <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['controller' => 'Blocks', 'action' => 'view', $blocks->id],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Blocks', 'action' => 'edit', $blocks->id ],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blocks', 'action' => 'delete', $blocks->id],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $blocks->id)]) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</section>

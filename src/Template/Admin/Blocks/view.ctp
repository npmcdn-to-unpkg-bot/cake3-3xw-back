<section class="panel">
   <header class="panel-heading">
      <h3><?= h($block->name) ?></h3>
   </header>
   <div class="panel-body">
      <h6 class="subheader"><?= __('Name') ?></h6>
      <p><?= h($block->name) ?></p>
      <h6 class="subheader"><?= __('Size') ?></h6>
      <p><?= h($block->size) ?></p>
      <h6 class="subheader"><?= __('Block Type') ?></h6>
      <p><?= $block->has('block_type') ? $this->Html->link($block->block_type->name, ['controller' => 'BlockTypes', 'action' => 'view', $block->block_type->id]) : '' ?></p>
      <h6 class="subheader"><?= __('Page') ?></h6>
      <p><?= $block->has('page') ? $this->Html->link($block->page->name, ['controller' => 'Pages', 'action' => 'view', $block->page->id]) : '' ?></p>
      <h6 class="subheader"><?= __('Id') ?></h6>
      <p><?= $this->Number->format($block->id) ?></p>
      <h6 class="subheader"><?= __('Created') ?></h6>
      <p><?= h($block->created) ?></p>
      <h6 class="subheader"><?= __('Modified') ?></h6>
      <p><?= h($block->modified) ?></p>
      <h6 class="subheader"><?= __('Content') ?></h6>
      <div class='detail_text'>
         <?= $this->Text->autoParagraph(h($block->content)); ?>
      </div>
      <div class="btn-group">
         <?= $this->Html->link(__('Edit Block'), ['action' => 'edit', $block->id], ['class'=>'btn btn-default btn-sm']) ?>
         <?= $this->Form->postLink(__('Delete Block'), ['action' => 'delete', $block->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id)]) ?>
      </div>
   </div>

</section>
<section class="panel">
   <header class="panel-heading">
      <?= __('Related Attachments') ?>
   </header>
   <div class="panel-body">
      <?php if (!empty($block->attachments)): ?>
         <table cellpadding="0" cellspacing="0" class='table table-hover general-table'>
            <tr>
               <th><?= __('Id') ?></th>
               <th><?= __('Name') ?></th>
               <th><?= __('Created') ?></th>
               <th><?= __('Modified') ?></th>
               <th><?= __('Type') ?></th>
               <th><?= __('Subtype') ?></th>
               <th><?= __('Size') ?></th>
               <th><?= __('Md5') ?></th>
               <th><?= __('Date') ?></th>
               <th><?= __('Title') ?></th>
               <th><?= __('Description') ?></th>
               <th><?= __('Author') ?></th>
               <th><?= __('Copyright') ?></th>
               <th><?= __('Path') ?></th>
               <th><?= __('Embed') ?></th>
               <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($block->attachments as $attachments): ?>
               <tr>
                  <td><?= h($attachments->id) ?></td>
                  <td><?= h($attachments->name) ?></td>
                  <td><?= h($attachments->created) ?></td>
                  <td><?= h($attachments->modified) ?></td>
                  <td><?= h($attachments->type) ?></td>
                  <td><?= h($attachments->subtype) ?></td>
                  <td><?= h($attachments->size) ?></td>
                  <td><?= h($attachments->md5) ?></td>
                  <td><?= h($attachments->date) ?></td>
                  <td><?= h($attachments->title) ?></td>
                  <td><?= h($attachments->description) ?></td>
                  <td><?= h($attachments->author) ?></td>
                  <td><?= h($attachments->copyright) ?></td>
                  <td><?= h($attachments->path) ?></td>
                  <td><?= h($attachments->embed) ?></td>

                  <td class="actions">
                     <div class="btn-group">
                        <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id],['class'=>'btn btn-xs btn-default']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id ],['class'=>'btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                     </div>
                  </td>
               </tr>

            <?php endforeach; ?>
         </table>
      <?php endif; ?>
   </div>
</section>

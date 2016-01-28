<section class="panel">
  <header class="panel-heading">
    <h3><?= h($atag->name) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Name') ?></h6>
    <p><?= h($atag->name) ?></p>
                <h6 class="subheader"><?= __('Slug') ?></h6>
    <p><?= h($atag->slug) ?></p>
                        <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= $this->Number->format($atag->id) ?></p>
                        <div class="btn-group">
      <?= $this->Html->link(__('Edit Atag'), ['action' => 'edit', $atag->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete Atag'), ['action' => 'delete', $atag->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $atag->id)]) ?>
    </div>
  </div>

</section>
<section class="panel">
  <header class="panel-heading">
    <?= __('Related Attachments') ?>
  </header>
  <div class="panel-body">
    <?php if (!empty($atag->attachments)): ?>
      <table cellpadding="0" cellspacing="0" class='table general-table'>
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
        <?php foreach ($atag->attachments as $attachments): ?>
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

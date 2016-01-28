<section class="panel">
  <header class="panel-heading">
    <h3><?= h($atag->name) ?></h3>
  </header>
  <div class="panel-body">
    <div class="btn-group">
      <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-default btn-sm']) ?>
      <?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $atag->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $atag->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $atag->id)]) ?>
    </div>
  </div>

</section>
<section class="panel">
  <header class="panel-heading">
    <?= __('Related Attachments') ?>
  </header>
  <div class="panel-body">
    <?php if (!empty($atag->attachments)): ?>
      <?= $this->Form->create($atag, ['url' => ['action' => 'edit']]); ?>
      <p>
          <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
      </p>
      <input type="hidden" class="form-control" name="attachments[_ids]">

      <table cellpadding="0" cellspacing="0" class='table table-hover general-table'>
        <tr>
          <th><?= __('Attachment') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Type') ?></th>
          <th><?= __('Title') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($atag->attachments as $attachments): ?>
          <tr id="item-<?= $attachments->id ?>">
            <td>
              <input type="hidden" class="form-control" name="attachments[_ids][]" value="<?= $attachments->id ?>">
              <?php
              switch ($attachments->subtype) {
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                case 'vimeo':
                case 'youtube':
                  echo $this->Image->image(
                    ['image' => $attachments->path, 'width' => 100],
                    ['class' => 'img-rounded img-responsive']
                  );
                  break;

                default:
                  echo $this->Html->image('http://placehold.it/677x112&text=' . $attachments->type . '/' . $attachments->subtype, ['class' => 'img-rounded img-responsive']);
                  break;
                }
              ?>
            </td>
            <td><?= h($attachments->name) ?></td>
            <td><?= h($attachments->type.'/'.$attachments->subtype) ?></td>
            <td><?= h($attachments->title) ?></td>
            <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id ],['class'=>'btn btn-default']) ?>
                <?= $this->Html->link(__('Remove'), 'javascript:$("#item-'.$attachments->id.'").remove();',['class'=>'btn btn-danger']) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
      <?= $this->Form->end() ?>
    <?php endif; ?>
  </div>
</section>

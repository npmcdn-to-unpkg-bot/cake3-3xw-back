<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Atag'), ['action' => 'edit', $atag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Atag'), ['action' => 'delete', $atag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Atags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atags view large-9 medium-8 columns content">
    <h3><?= h($atag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($atag->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($atag->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($atag->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($atag->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>

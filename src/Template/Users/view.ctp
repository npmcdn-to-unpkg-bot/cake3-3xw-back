<section class="panel">
    <header class="panel-heading">
        <h3><?= h($user->id) ?></h3>
    </header>
    <div class="panel-body">
                                                                <h6 class="subheader"><?= __('Email') ?></h6>
                <p><?= h($user->email) ?></p>
                                                                <h6 class="subheader"><?= __('Password') ?></h6>
                <p><?= h($user->password) ?></p>
                                                                <h6 class="subheader"><?= __('Digest Pass') ?></h6>
                <p><?= h($user->digest_pass) ?></p>
                                                                <h6 class="subheader"><?= __('Role') ?></h6>
                <p><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></p>
                                                                                                <h6 class="subheader"><?= __('Id') ?></h6>
                <p><?= $this->Number->format($user->id) ?></p>
                                                                                <h6 class="subheader"><?= __('Created') ?></h6>
                <p><?= h($user->created) ?></p>
                                <h6 class="subheader"><?= __('Modified') ?></h6>
                <p><?= h($user->modified) ?></p>
                                                                                <div class="btn-group">
                    <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class'=>'btn btn-default btn-sm']) ?>
                    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </div>
        </div>

</section>
<section class="panel">
    <header class="panel-heading">
        <?= __('Related FileStorage') ?>
    </header>
    <div class="panel-body">
                <?php if (!empty($user->file_storage)): ?>
                <table cellpadding="0" cellspacing="0" class='table general-table'>
                        <tr>
                                                                <th><?= __('Id') ?></th>
                                                                <th><?= __('User Id') ?></th>
                                                                <th><?= __('Foreign Key') ?></th>
                                                                <th><?= __('Model') ?></th>
                                                                <th><?= __('Filename') ?></th>
                                                                <th><?= __('Filesize') ?></th>
                                                                <th><?= __('Mime Type') ?></th>
                                                                <th><?= __('Extension') ?></th>
                                                                <th><?= __('Hash') ?></th>
                                                                <th><?= __('Path') ?></th>
                                                                <th><?= __('Adapter') ?></th>
                                                                <th><?= __('Created') ?></th>
                                                                <th><?= __('Modified') ?></th>
                                                                <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->file_storage as $fileStorage): ?>
                        <tr>
                                <td><?= h($fileStorage->id) ?></td>
                                <td><?= h($fileStorage->user_id) ?></td>
                                <td><?= h($fileStorage->foreign_key) ?></td>
                                <td><?= h($fileStorage->model) ?></td>
                                <td><?= h($fileStorage->filename) ?></td>
                                <td><?= h($fileStorage->filesize) ?></td>
                                <td><?= h($fileStorage->mime_type) ?></td>
                                <td><?= h($fileStorage->extension) ?></td>
                                <td><?= h($fileStorage->hash) ?></td>
                                <td><?= h($fileStorage->path) ?></td>
                                <td><?= h($fileStorage->adapter) ?></td>
                                <td><?= h($fileStorage->created) ?></td>
                                <td><?= h($fileStorage->modified) ?></td>

                                <td class="actions">
                                    <div class="btn-group">
                                        <?= $this->Html->link(__('View'), ['controller' => 'FileStorage', 'action' => 'view', $fileStorage->id],['class'=>'btn btn-xs btn-default']) ?>

                                        <?= $this->Html->link(__('Edit'), ['controller' => 'FileStorage', 'action' => 'edit', $fileStorage->id ],['class'=>'btn btn-xs btn-default']) ?>

                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'FileStorage', 'action' => 'delete', $fileStorage->id],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $fileStorage->id)]) ?>

                                    </div>    
                                </td>
                                        </tr>

                                        <?php endforeach;
                                        ?>
                </table>
                <?php endif; ?>
        </div>
</section>

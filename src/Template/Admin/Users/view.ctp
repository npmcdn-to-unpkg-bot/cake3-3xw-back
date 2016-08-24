<section class="panel">
  <header class="panel-heading">
    <h3><?= h($user->username) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= h($user->id) ?></p>
                <h6 class="subheader"><?= __('Username') ?></h6>
    <p><?= h($user->username) ?></p>
                <h6 class="subheader"><?= __('Email') ?></h6>
    <p><?= h($user->email) ?></p>
                <h6 class="subheader"><?= __('Password') ?></h6>
    <p><?= h($user->password) ?></p>
                <h6 class="subheader"><?= __('First Name') ?></h6>
    <p><?= h($user->first_name) ?></p>
                <h6 class="subheader"><?= __('Last Name') ?></h6>
    <p><?= h($user->last_name) ?></p>
                <h6 class="subheader"><?= __('Token') ?></h6>
    <p><?= h($user->token) ?></p>
                <h6 class="subheader"><?= __('Api Token') ?></h6>
    <p><?= h($user->api_token) ?></p>
                <h6 class="subheader"><?= __('Role') ?></h6>
    <p><?= h($user->role) ?></p>
                            <h6 class="subheader"><?= __('Token Expires') ?></h6>
    <p><?= h($user->token_expires) ?></p>
        <h6 class="subheader"><?= __('Activation Date') ?></h6>
    <p><?= h($user->activation_date) ?></p>
        <h6 class="subheader"><?= __('Tos Date') ?></h6>
    <p><?= h($user->tos_date) ?></p>
        <h6 class="subheader"><?= __('Created') ?></h6>
    <p><?= h($user->created) ?></p>
        <h6 class="subheader"><?= __('Modified') ?></h6>
    <p><?= h($user->modified) ?></p>
                    <h6 class="subheader"><?= __('Active') ?></h6>
    <p><?= $user->active ? __('Yes') : __('No'); ?></p>
        <h6 class="subheader"><?= __('Is Superuser') ?></h6>
    <p><?= $user->is_superuser ? __('Yes') : __('No'); ?></p>
                <div class="btn-group">
      <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
    </div>
  </div>

</section>
<section class="panel">
  <header class="panel-heading">
    <?= __('Related SocialAccounts') ?>
  </header>
  <div class="panel-body">
    <?php if (!empty($user->social_accounts)): ?>
      <table cellpadding="0" cellspacing="0" class='table table-hover general-table'>
        <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('User Id') ?></th>
                    <th><?= __('Provider') ?></th>
                    <th><?= __('Username') ?></th>
                    <th><?= __('Reference') ?></th>
                    <th><?= __('Avatar') ?></th>
                    <th><?= __('Description') ?></th>
                    <th><?= __('Link') ?></th>
                    <th><?= __('Token') ?></th>
                    <th><?= __('Token Secret') ?></th>
                    <th><?= __('Token Expires') ?></th>
                    <th><?= __('Active') ?></th>
                    <th><?= __('Data') ?></th>
                    <th><?= __('Created') ?></th>
                    <th><?= __('Modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->social_accounts as $socialAccounts): ?>
          <tr>
            <td><?= h($socialAccounts->id) ?></td>
            <td><?= h($socialAccounts->user_id) ?></td>
            <td><?= h($socialAccounts->provider) ?></td>
            <td><?= h($socialAccounts->username) ?></td>
            <td><?= h($socialAccounts->reference) ?></td>
            <td><?= h($socialAccounts->avatar) ?></td>
            <td><?= h($socialAccounts->description) ?></td>
            <td><?= h($socialAccounts->link) ?></td>
            <td><?= h($socialAccounts->token) ?></td>
            <td><?= h($socialAccounts->token_secret) ?></td>
            <td><?= h($socialAccounts->token_expires) ?></td>
            <td><?= h($socialAccounts->active) ?></td>
            <td><?= h($socialAccounts->data) ?></td>
            <td><?= h($socialAccounts->created) ?></td>
            <td><?= h($socialAccounts->modified) ?></td>

            <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['controller' => 'SocialAccounts', 'action' => 'view', $socialAccounts->id],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'SocialAccounts', 'action' => 'edit', $socialAccounts->id ],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SocialAccounts', 'action' => 'delete', $socialAccounts->id],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $socialAccounts->id)]) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</section>

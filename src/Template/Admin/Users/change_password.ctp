<div class="col-xs-12">
  <?= $this->Form->create($user) ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?= __d('CakeDC/Users', 'Please enter the new password') ?>
      </h3>
    </div>
    <div class="panel-body">
      <div class="users form">

        <?php if ($validatePassword) : ?>
          <?= $this->Form->input('current_password', [
            'type' => 'password',
            'required' => true,
            'label' => __d('CakeDC/Users', 'Current password'),
            'class' => 'form-control'
          ]);
          ?>
        <?php endif; ?>
        <?= $this->Form->input('password',['class' => 'form-control']); ?>
        <?= $this->Form->input('password_confirm', ['type' => 'password', 'required' => true,'class' => 'form-control']); ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success']) ?>
      </div>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>

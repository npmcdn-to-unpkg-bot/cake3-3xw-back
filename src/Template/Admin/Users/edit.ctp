<div class="col-md-12">
  <?= $this->Form->create($user); ?>
  <section class="panel panel-default">
    <header class="panel-heading">
      <h3><?= __('Edit User') ?></h3>
    </header>
    <div class="panel-body">
      <div class="position-center">
        <?php
        echo $this->Form->input('username', ['class' => 'form-control']);
        echo $this->Form->input('email', ['class' => 'form-control']);
        //echo $this->Form->input('password', ['class' => 'form-control']);
        echo $this->Form->input('first_name', ['class' => 'form-control']);
        echo $this->Form->input('last_name', ['class' => 'form-control']);
        //echo $this->Form->input('token', ['class' => 'form-control']);
        //echo $this->Form->input('token_expires', ['class' => 'form-control']);
        //echo $this->Form->input('api_token', ['class' => 'form-control']);
        //echo $this->Form->input('activation_date', ['class' => 'form-control']);
        //echo $this->Form->input('tos_date', ['class' => 'form-control']);
        echo $this->Form->input('active', ['type' => 'checkbox']);
        //echo $this->Form->input('is_superuser', ['class' => 'form-control']);
        //echo $this->Form->input('role', ['class' => 'form-control']);
        ?>
      </div>
    </div>
    <div class="panel-footer">
      <div class="btn-group">
        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success']) ?>
      </div>
    </div>
  </section>
  <?= $this->Form->end() ?>
</div>

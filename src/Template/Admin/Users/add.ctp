<div class="col-md-12">
  <?= $this->Form->create('User'); ?>
  <section class="panel panel-default">
    <header class="panel-heading">
      <h3><?= __('Add User') ?></h3>
    </header>
    <div class="panel-body">
      <div class="position-center">
        <?php
        echo $this->Form->input('username', ['class' => 'form-control','required' => 'required','placeholder' => 'john_doe']);
        echo $this->Form->input('email', ['class' => 'form-control','required' => 'required','placeholder' => 'john.doe@gmail.com']);
        echo $this->Form->input('password', ['class' => 'form-control','required' => 'required']);
        echo $this->Form->input('first_name', ['class' => 'form-control','required' => 'required','placeholder' => 'John']);
        echo $this->Form->input('last_name', ['class' => 'form-control','required' => 'required','placeholder' => 'Doe']);
        //echo $this->Form->input('token', ['class' => 'form-control']);
        //echo $this->Form->input('token_expires', ['class' => 'form-control']);
        //echo $this->Form->input('api_token', ['class' => 'form-control']);
        //echo $this->Form->input('activation_date', ['class' => 'form-control']);
        //echo $this->Form->input('tos_date', ['class' => 'form-control']);
        //echo $this->Form->input('active', ['class' => 'form-control']);
        //echo $this->Form->input('is_superuser', ['class' => 'form-control']);
        echo $this->Form->input('role', ['type' => 'hidden','class' => 'form-control','value' => 'museum']);
        echo $this->Form->input('active', ['type' => 'checkbox','checked' => 'checked']);
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

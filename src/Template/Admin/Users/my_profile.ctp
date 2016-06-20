<section class="panel">
  <header class="panel-heading">
    <?= __('Edit User') ?>
  </header>
  <div class="panel-body">
    <div class="position-center">
      <?= $this->Form->create($user); ?>
      <?php
      echo $this->Form->input('email', array('class' => 'form-control'));
      ?>
      <hr>
      <div class="btn-group">
        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-danger']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</section>

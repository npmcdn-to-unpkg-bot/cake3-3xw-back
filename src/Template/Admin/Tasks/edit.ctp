<section class="panel">
  <header class="panel-heading">
    <?= __('Edit Task') ?>
  </header>
  <div class="panel-body">
    <div class="position-center">
      <?= $this->Form->create($task); ?>
      <?php
                  echo $this->Form->input('finished', array('class' => 'form-control'));
                        echo $this->Form->input('name', array('class' => 'form-control'));
                        echo $this->Form->input('user_id', ['options' => $users, 'class' => 'form-control']);
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

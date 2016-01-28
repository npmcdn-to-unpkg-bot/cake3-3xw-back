<section class="panel">
  <header class="panel-heading">
    <?= __('Edit Attachment') ?>
  </header>
  <div class="panel-body">
    <div class="position-center">
      <?= $this->Form->create($attachment); ?>
      <?php
      echo $this->Form->input('name', array('class' => 'form-control'));
      echo $this->Form->input('type', array('class' => 'form-control'));
      echo $this->Form->input('subtype', array('class' => 'form-control'));
      echo $this->Form->input('size', array('class' => 'form-control'));
      echo $this->Form->input('title', array('class' => 'form-control'));
      echo $this->Form->input('date', array('empty' => true, 'default' => '', 'class' => 'form-control'));
      echo $this->Form->input('description', array('class' => 'form-control'));
      echo $this->Form->input('author', array('class' => 'form-control'));
      echo $this->Form->input('copyright', array('class' => 'form-control'));
      echo $this->Form->input('path', array('class' => 'form-control'));
      echo $this->Form->input('embed', array('class' => 'form-control'));
      echo $this->Form->input('atags._ids', ['options' => $atags, 'class' => 'form-control']);
      ?>
      <hr>
      <div class="btn-group">
        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-danger']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

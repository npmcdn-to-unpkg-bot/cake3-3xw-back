<section class="panel">
   <header class="panel-heading">
      <?= __('Change Password') ?>
   </header>
   <div class="panel-body">
      <div class="position-center">
         <?= $this->Form->create($user); ?>
         <?php
         echo $this->Form->input('password', array('class' => 'form-control'));
         echo $this->Form->input('re-password', array('class' => 'form-control required', 'type'=>'password'));
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

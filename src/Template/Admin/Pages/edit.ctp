<section class="panel">
   <header class="panel-heading">
      <?= __('Edit Page') ?>
   </header>
   <div class="panel-body">
      <div class="position-center">
         <?= $this->Form->create($page); ?>
         <?php
         echo $this->Form->input('active', array('class' => 'form-control'));
         echo $this->Form->input('homepage', array('class' => 'form-control'));
         echo $this->Form->input('main_menu', array('class' => 'form-control'));
         echo $this->Form->input('right_menu', array('class' => 'form-control'));
         echo $this->Form->input('slug', array('class' => 'form-control'));
         echo $this->Form->input('main_menu_order', array('class' => 'form-control'));
         echo $this->Form->input('name', array('class' => 'form-control'));
         echo $this->Form->input('parent_id', ['options' => $parentPages, 'empty' => true]);
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

<section class="panel">
   <header class="panel-heading">
      <?= __('Add Block') ?>
   </header>
   <div class="panel-body">
      <div class="position-center">
         <?= $this->Form->create($block); ?>
         <?php
         echo $this->Form->input('name', array('class' => 'form-control'));
         echo $this->Form->input('size', array('class' => 'form-control', 'type'=>'select', 'options'=>['col-sm-12'=>'FULL WIDTH', 'col-sm-6'=>'HALF WIDTH']));
         echo $this->element('Attachments/add', array(
            'settings' => array(
               'relations' => 'belongsToMany', // or belongsTo
               //'field' => 'attachment_id'  // if belongsTo
               'maxsize' => 30, // 30MB
               'types' => array(
                  'image/jpeg',
                  'image/png',
                  'application/pdf'
               )
            ),
            'attachments' => $block['attachments']
         ));
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

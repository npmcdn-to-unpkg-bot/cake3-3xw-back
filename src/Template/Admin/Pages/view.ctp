<div class="row">
   <div class="col-sm-9">
      <section class="">
         <div class="panel-body">
            <div class="row">
               <?php foreach ($page->blocks as $block): ?>
                  <?php if($block->block_type_id == 3):?>
                     <div class="col-sm-12">
                        <div class="admin-block">
                           <?= $this->element('slider', ['slides' =>$block->attachments])?>
                           <div class="btn-group">
                              <?= $this->Html->link(__('Edit'), ['controller'=>'blocks','action' => 'edit', $block->id, $block->block_type_id, $page->id], ['class'=>'btn btn-default btn-xs']) ?>
                              <?= $this->Form->postLink(__('Delete'), ['controller'=>'blocks','action' => 'delete', $block->id], ['class'=>'btn btn-danger btn-xs'], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
                           </div>
                        </div>
                     </div>
                  <?php endif;?>
               <?php endforeach; ?>
               <?php foreach ($page->blocks as $block): ?>
                  <div class="masonry-content">
                     <?php if($block->block_type_id == 1):?>
                        <div class="<?=$block->size?> block">
                           <div class="admin-block_text">
                              <?=$block->content?>
                              <hr>
                              <div class="btn-group">
                                 <?= $this->Html->link(__('Edit'), ['controller'=>'blocks','action' => 'edit', $block->id, $block->block_type_id, $page->id], ['class'=>'btn btn-default btn-xs']) ?>
                                 <?= $this->Form->postLink(__('Delete'), ['controller'=>'blocks','action' => 'delete', $block->id], ['class'=>'btn btn-danger btn-xs'], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
                              </div>
                           </div>
                        </div>
                     <?php elseif ($block->block_type_id == 2 ):?>
                        <div class="<?=$block->size?> admin-block_text block">
                           <div class="admin-block_img">
                              <?php foreach ($block->attachments as $att): ?>
                                 <?= $this->Image->image(['image' => $att->path, 'width' => '900', 'cropratio' => '16:9', 'valign' => 'center'], ['class' => 'img-responsive']) ?>
                              <?php endforeach; ?>
                              <hr>
                              <div class="btn-group">
                                 <?= $this->Html->link(__('Edit'), ['controller'=>'blocks','action' => 'edit', $block->id, $block->block_type_id, $page->id], ['class'=>'btn btn-default btn-xs']) ?>
                                 <?= $this->Form->postLink(__('Delete'), ['controller'=>'blocks','action' => 'delete', $block->id], ['class'=>'btn btn-danger btn-xs'], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
                              </div>
                           </div>
                        </div>

                     <?php elseif ($block->block_type_id == 4 ):?>
                        <div class="<?=$block->size?> admin-block_text block">
                           <?=$this->cell('Partners')?>
                           <?= $this->Html->link(__('Edit Partners'), ['controller'=>'partners','action' => 'index'], ['class'=>'btn btn-default btn-xs']) ?>
                           <?= $this->Form->postLink(__('Delete'), ['controller'=>'blocks','action' => 'delete', $block->id], ['class'=>'btn btn-danger btn-xs'], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
                        </div>
                     <?php endif;?>
                  </div>
               <?php endforeach; ?>
            </div>
            <!-- Single button -->
            <hr>
            <div class="btn-group">
               <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Add <span class="caret"></span>
               </button>
               <ul class="dropdown-menu">
                  <?php foreach ($blockTypes as $key => $value): ?>
                     <li><a href="#"><?=$this->Html->link($value, ['controller'=>'blocks', 'action'=>'add', $key, $page->id])?></a></li>
                  <?php endforeach; ?>
               </ul>
            </div>
         </div>
      </section>
   </div>
   <div class="col-sm-3">
      <section class="panel">
         <header class="panel-heading">
            <h3><?= h($page->name) ?></h3>
         </header>
         <div class="panel-body">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($page->name) ?></p>
            <h6 class="subheader"><?= __('Parent Page') ?></h6>
            <p><?= $page->has('parent_page') ? $this->Html->link($page->parent_page->name, ['controller' => 'Pages', 'action' => 'view', $page->parent_page->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Main Menu Order') ?></h6>
            <p><?= $this->Number->format($page->main_menu_order) ?></p>
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $page->active ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Main Menu') ?></h6>
            <p><?= $page->main_menu ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Right Menu') ?></h6>
            <p><?= $page->right_menu ? __('Yes') : __('No'); ?></p>
            <div class="btn-group">
               <?= $this->Html->link(__('Edit Page'), ['action' => 'edit', $page->id], ['class'=>'btn btn-default btn-sm']) ?>
               <?= $this->Form->postLink(__('Delete Page'), ['action' => 'delete', $page->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
            </div>
         </div>
      </section>
   </div>
</div>

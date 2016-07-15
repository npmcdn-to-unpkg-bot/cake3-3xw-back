<?php $this->assign('title', $page[0]->name);?>
<div class="container">
   <div class="row">
      <?php foreach ($page[0]->blocks as $block): ?>
         <?php if($block->block_type_id == 1):?>
            <div class="<?=$block->size?> content_block_text block">
               <?=$block->content?>
            </div>
         <?php elseif ($block->block_type_id == 2 ):?>
            <div class="<?=$block->size?> content_block_img block">
               <?php foreach ($block->attachments as $att): ?>
                  <?= $this->Image->image(['image' => $att->path, 'width' => '900', 'valign' => 'center'], ['class' => 'img-responsive']) ?>
               <?php endforeach; ?>
            </div>
         <?php endif;?>
      <?php endforeach; ?>
   </div>
</div>
<?php echo $this->Html->script('masonry', ['block' => 'scriptBottom'])?>

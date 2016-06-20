<?php
use Cake\Core\Configure;

$this->Html->script([
  'angular/angular.1.2.20.min.js',
  'tags/core.min.js',
  'attachment/edit.min.js'
], [
  'block' =>'script'
]);
?>
<script type="text/javascript">
  var tags = <?= json_encode($attachment['atags']) ?>;
</script>
<section class="panel">
  <header class="panel-heading">
    <?= __('Edit Attachment') ?>
  </header>
  <div class="panel-body">
    <div class="position-center">
      <?= $this->Form->create($attachment); ?>
      <div class="row">
        <div class="col-md-6">
          <label ><?= __('Attachment') ?></label>
          <?php
          switch ($attachment->subtype) {
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'png':
              echo $this->Image->image(
                ['image' => $attachment->path, 'width' => 677],
                ['class' => 'img-rounded img-responsive']
              );
              break;

            case 'vimeo':
            case 'youtube':
            case 'other':
              echo $this->Embed->responsive($attachment->embed);
              echo $this->Form->input('embed', array('class' => 'form-control'));
              break;

            default:
              echo $this->Html->image('http://placehold.it/677x381&text=' . $attachment->type . '/' . $attachment->subtype, ['class' => 'img-rounded img-responsive']);
              break;
            }
          ?>
          <label for="atags"><?= __('Tags') ?></label>
          <p>
            <!-- <input type="hidden" name="atags[]" value="" > -->
            <select multiple name="atags[][name]" id="tagsinput" ></select>
          </p>
          <p>
            <small>Enter tag name and hit enter.</small>
          </p>
        </div>
        <div class="col-md-6">
          <?php
          echo $this->Form->input('name', array('class' => 'form-control'));
          echo $this->Form->input('title', array('class' => 'form-control'));
          echo $this->Form->input('date', array('empty' => true, 'default' => '', 'class' => 'form-control'));
          echo $this->Form->input('description', array('class' => 'form-control'));
          echo $this->Form->input('author', array('class' => 'form-control'));
          echo $this->Form->input('copyright', array('class' => 'form-control'));
          ?>
        </div>
      </div>
      <hr>
      <div class="btn-group">
        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-danger']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</section>

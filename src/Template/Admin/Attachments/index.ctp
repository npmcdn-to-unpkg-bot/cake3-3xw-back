<?php
use Cake\Core\Configure;

$this->Html->script([
  'angular/angular.1.2.20.min.js',
  'tags/core.min.js',
  'attachment/core.min.js',
  'attachment/index.min.js'
], [
  'block' =>'script'
]);
?>

<script>
    var attachment_add_settings = <?php echo json_encode($settings); ?>;
    attachment_add_settings.site_url = "<?= $this->Url->build('/'.$this->request->params['prefix'].'/') ?>";
    attachment_add_settings.site_base_url = "<?= $this->Url->build('/') ?>";
    var attachments = [];
</script>

<div class="" style="max-width:1200px;">
  <div class="panel panel-info">
      <div class="panel-heading">
          <h3 class="panel-title">Add Attachments</h3>
      </div>
      <div class="panel-body">
          <button id="upload-many" type="button" class="btn btn-primary">Upload Files</button>
          <button id="add-embed" type="button" class="btn btn-primary">Add an embed file</button>
      </div>
  </div>
  <?php echo $this->element('Attachments/browse'); ?>
</div>

<!-- MODAL -->
<?php echo $this->element('Attachments/modal'); ?>

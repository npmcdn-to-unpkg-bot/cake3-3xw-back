<?php
use Cake\Core\Configure;

$this->Html->script([
  'angular/angular.1.2.20.min.js',
  'tags/core.min.js',
  'attachment/core.min.js',
  'attachment/add.min.js'
], [
  'block' =>'script'
]);
?>
<script>
    var attachment_add_settings = <?= json_encode(array_merge( Configure::read('Storage.settings'),$settings)) ?>;
    attachment_add_settings.site_url = "<?= $this->Url->build('/'.$this->request->params['prefix'].'/') ?>";
    attachment_add_settings.site_base_url = "<?= $this->Url->build('/') ?>";
    var attachments = <?= json_encode($attachments) ?>;
</script>
<br/>

<!-- ACTIONS -->
<button id="choose-many" type="button" class="btn btn-primary">Choose exisiting attachment(s)</button>
<button id="upload-many" type="button" class="btn btn-primary">Upload Files</button>
<button id="add-embed" type="button" class="btn btn-primary">Add an embed file</button>

<?php if ($settings['relations']== 'belongsToMany') { ?>
    <input type="hidden" name="attachments[]" value="" id="AttachmentAttachment_">
<?php } ?>

<br/>

<!-- LIST -->
<div id="attachment-list" >
    <div class="row attachment-list-sortable"></div>
</div>

<!-- MODAL -->
<?php echo $this->element('Attachments/modal'); ?>

<!-- attchment-item-template -->
<?php echo $this->element('Attachments/item-template'); ?>

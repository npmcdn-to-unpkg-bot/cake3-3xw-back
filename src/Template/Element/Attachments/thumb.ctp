<div id="attachment-selection-id-<?php echo $attachment->id; ?>" class="attachment-thumb ">
  <div class="attachment-data" >
    <input class="attchment-input-id" name="id" type="hidden" value="<?php echo $attachment->id; ?>">
    <script class="attachment-data-json" type="text/x-3xw-json">
    <?php echo json_encode($attachment); ?>
    </script>
  </div>
  <div class="attachment-image">
    <?php
    switch ($attachment->subtype) {
      case 'jpg':
      case 'jpeg':
      case 'gif':
        case 'png':
        case 'vimeo':
        case 'youtube':
        echo $this->Image->image(
        array(
          'image' => $attachment->path,
          'width' => 677,
          'cropratio' => '16:9'
        ), array(
          'class' => 'img-rounded img-responsive'
        )
      );
      break;

      default:
      echo $this->Html->image('http://placehold.it/677x381&text=' . $attachment->type . '/' . $attachment->subtype, array(
        'class' => 'img-rounded img-responsive'
      )
    );
    break;
    break;
  }
  ?>
</div>

<div class="attachment-info">
  <div class="attachment-title">
      <b>Name:</b> <?php echo $attachment->name; ?><br/>
      <?php echo (!empty($attachment->title))? '<b>Title:</b> '.$attachment->title: ''; ?>
  </div>
  <div class="attachment-details">
    <?php
    $size = round($attachment->size/1024);
    $size = ($size > 999 )? (round($size/102.4)/10).'MB' : $size.'KB';
    echo $size . ' - ' . $attachment->type . '/' . $attachment->subtype;
    ?>
    <br/>
    <?php echo $attachment->date; ?>
  </div>
</div>
<div class="attachment-actions">
  <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', array('action' => 'edit', $attachment->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
  <?php echo ( $attachment->type != 'embed' ) ? $this->Html->link('<span class="glyphicon glyphicon-arrow-down"></span>', array('action' => 'download', $attachment->id), array('class' => 'btn btn-primary', 'escape' => false)) : ''; ?>
  <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $attachment->id), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete the Attachment: %s?', $attachment->name)); ?>
</div>
</div>

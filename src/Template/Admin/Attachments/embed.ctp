<!-- Embed and name -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">
      1) Add title and embed code
    </h3>
  </div>
  <div class="panel-body">
    <div id="embed" >
      <?php
      echo $this->Form->input('name', array('type' => 'text', 'class'=>'form-control','id' => 'attachment-name'));
      echo $this->Form->input('embed', array('type' => 'textarea', 'class'=>'form-control','id' => 'attachment-embed'));
      ?>
    </div>
  </div>
</div>

<!-- Tags -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">
      2) Create Associated Tags
    </h3>
  </div>
  <div class="panel-body">
      <p>To create a tag: please type a tag's name below and hit enter spacebar.</p>
      <select multiple id="tagsinput" ></select>
  </div>
</div>

<!-- Optinal fields -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">
      3) Add options details
    </h3>
  </div>
  <div class="panel-body">
    <div class="row optional-fields">
      <div class="col-md-6">
        <?php
        echo $this->Form->input('title', array('class' => 'form-control'));
        echo $this->Form->input('date', array('empty' => true, 'default' => '', 'class' => 'form-control','type' => 'datetime'));
        echo $this->Form->input('description', array('class' => 'form-control','type' => 'textarea'));
        ?>
      </div>
      <div class="col-md-6">
        <?php
        echo $this->Form->input('author', array('class' => 'form-control'));
        echo $this->Form->input('copyright', array('class' => 'form-control'));
        ?>
      </div>
    </div>
  </div>
  <div class="panel-body">
      <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success', 'id' => 'attachment-embed-submit')); ?>
  </div>
</div>

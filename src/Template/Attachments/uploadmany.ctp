<!-- file selection -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">1) Select File(s)</h3>
  </div>
  <div class="panel-body">
    <div id="fileDropArea" >
        <div id="fileDrop">
            <p>Drop files here<br/>Or</p>
            <div class="inputbtn">
                <input type="file" id="fileField" name="fileField" multiple />
            </div>
        </div>
    </div>
  </div>
</div>

<!-- tags -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">2) Create Associated Tags</h3>
  </div>
  <div class="panel-body">
    <div id="tags">
        <p>To create a tag: please type a tag's name below and hit enter spacebar.</p>
        <select multiple id="tagsinput" ></select>
    </div>
  </div>
</div>

<!-- optional fields -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">3) Add options details</h3>
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
</div>

<!-- upload -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">4) Start Upload</h3>
  </div>
  <div class="panel-body">
    <a id="reset" class="btn btn-danger" href="#" title="Remove all files from list">Clear list</a>
    <a id="upload" class="btn btn-primary"  href="#" title="Upload all files in list">Upload files</a>
  </div>
  <div id="filelistinfo" class="panel-body"></div>
  <div id="fileList" class="panel-body"></div>
</div>

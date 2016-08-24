<?php
use Cake\Core\Configure;
$this->Html->css(['includes/admin/layout/login.css'],['block' => 'css']);
$this->layout = 'login';
?>

<div class="container">

  <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

    <div class="row">
      <div class="iconmelon">
        <svg viewBox="0 0 32 32">
          <g filter="">
            <use xlink:href="#git"></use>
          </g>
        </svg>
      </div>
    </div>

    <div class="panel panel-default" >
      <div class="panel-heading">
        <div class="panel-title text-center">lausanne-musees.ch</div>
      </div>

      <div class="panel-body" >

        <?= $this->Form->create('User', ['class'=>'form-horizontal','id' => 'form'])?>
            <legend><?= __d('CakeDC/Users', 'Please enter the new password') ?></legend>
            <div class="input-group">
              <?= $this->Form->input('password', ['required' => true,'class' => 'form-control', 'label' => 'Your new password']) ?>
            </div>

            <div class="input-group">
              <?= $this->Form->input('password_confirm', ['required' => true,'class' => 'form-control', 'label' => 'Repeat your new password']) ?>
            </div>

          <div class="form-group">
            <div class="col-sm-12 controls">
              <d iv class="btn-group pull-right">
                <button type="submit" href="#" class="btn btn-primary "><i class="glyphicon glyphicon-ok"></i> send</button>
              </div>
            </div>
          </div>

        <?= $this->Form->end() ?>

      </div>
    </div>
  </div>
</div>

<?= $this->element('logo'); ?>

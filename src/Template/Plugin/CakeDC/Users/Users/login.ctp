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

          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <?= $this->Form->input('email', ['required' => true,'class' => 'form-control', 'placeholder' =>"john.doe@gmail.com", 'label' => false]) ?>
          </div>

          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <?= $this->Form->input('password', ['required' => true,'class' => 'form-control', 'label' => false]) ?>
          </div>

          <?php
          if (Configure::check('Users.RememberMe.active')) {
            echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
              'type' => 'checkbox',
              'label' => __d('CakeDC/Users', 'Remember me'),
              'checked' => 'checked'
            ]);
          }
          ?>

          <div class="form-group">
            <div class="col-sm-12 controls">
              <d iv class="btn-group pull-right">

                <button type="submit" href="#" class="btn btn-primary "><i class="glyphicon glyphicon-log-in"></i> login</button>

                <?php
                $registrationActive = Configure::read('Users.Registration.active');
                if ($registrationActive) {
                  echo $this->Html->link(__d('CakeDC/Users', 'Register'), ['action' => 'register'],['class' => 'btn btn-default']);
                }
                if (Configure::read('Users.Email.required')) {
                  if ($registrationActive) {
                    echo ' | ';
                  }
                  echo $this->Html->link(__d('CakeDC/Users', 'Reset Password'), ['action' => 'requestResetPassword'],['class' => 'btn btn-default']);
                }
                ?>
              </div>
            </div>
          </div>

        <?= $this->Form->end() ?>

      </div>
    </div>
  </div>
</div>

<?= $this->element('logo'); ?>

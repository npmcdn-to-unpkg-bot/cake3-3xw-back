<?= $this->Form->create('User',['class'=>'form-signin'])?>
  <div class="form-signin-heading">
      <?php echo $this->Html->link($this->Html->image('logo.png', ['height'=>'']),'/',array('escape' => false,'class' => '')); ?>
  </div>
  <div class="login-wrap">
      <div class="user-login-info">
          <?= $this->Form->input('email', ['class'=>'form-control', 'placeholder'=>'User ID', 'label'=>false])?>
          <?= $this->Form->input('password', ['class'=>'form-control', 'placeholder'=>'Password', 'label'=>false])?>
      </div>
      <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
          <span class="pull-right">
              <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

          </span>
      </label>
      <?php echo $this->Form->submit(__('Sign in'), array('class' => 'btn btn-lg btn-login btn-block')); ?>
      <?php echo $this->Form->end(); ?>
  </div>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <?= $this->Form->create('User', ['action'=>'recover'])?>
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <?= $this->Form->input('email', ['class'=>'form-control', 'placeholder'=>'Email', 'label'=>false])?>

                </div>
                <div class="modal-footer">
                    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

</form>

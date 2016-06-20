<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

?>
<?php Debugger::checkSecurityKeys(); ?>

<div class="container">
   <div class="row">
      <!-- CAKE checks -->
      <div class="col-md-6">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">CakePHP 3 checks</h3>
            </div>
            <div class="panel-body">
              <?php if (is_writable(TMP)): ?>
                  <p class="alert alert-success">Your tmp directory is writable.</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your tmp directory is NOT writable.</p>
              <?php endif; ?>

              <?php if (is_writable(LOGS)): ?>
                  <p class="alert alert-success">Your logs directory is writable.</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your logs directory is NOT writable.</p>
              <?php endif; ?>

              <?php $settings = Cache::config('_cake_core_'); ?>
              <?php if (!empty($settings)): ?>
                  <p class="alert alert-success">The <em><?= $settings['className'] ?>Engine</em> is being used for core caching. To change the config edit config/app.php</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your cache is NOT working. Please check the settings in config/app.php</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">PHP checks</h3>
            </div>
            <div class="panel-body">
              <?php if (version_compare(PHP_VERSION, '5.4.16', '>=')): ?>
                  <p class="alert alert-success">Your version of PHP is 5.4.16 or higher.</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your version of PHP is too low. You need PHP 5.4.16 or higher to use CakePHP.</p>
              <?php endif; ?>

              <?php if (extension_loaded('mbstring')): ?>
                  <p class="alert alert-success">Your version of PHP has the mbstring extension loaded.</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your version of PHP does NOT have the mbstring extension loaded.</p>;
              <?php endif; ?>

              <?php if (extension_loaded('openssl')): ?>
                  <p class="alert alert-success">Your version of PHP has the openssl extension loaded.</p>
              <?php elseif (extension_loaded('mcrypt')): ?>
                  <p class="alert alert-success">Your version of PHP has the mcrypt extension loaded.</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your version of PHP does NOT have the openssl or mcrypt extension loaded.</p>
              <?php endif; ?>

              <?php if (extension_loaded('intl')): ?>
                  <p class="alert alert-success">Your version of PHP has the intl extension loaded.</p>
              <?php else: ?>
                  <p class="alert alert-warning">Your version of PHP does NOT have the intl extension loaded.</p>
              <?php endif; ?>
            </div>
          </div>
      </div>

      <!-- db checks -->
      <div class="col-md-6">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">DB checks</h3>
            </div>
            <div class="panel-body">
              <?php
                  try {
                      $connection = ConnectionManager::get('default');
                      $connected = $connection->connect();
                  } catch (Exception $connectionError) {
                      $connected = false;
                      $errorMsg = $connectionError->getMessage();
                      if (method_exists($connectionError, 'getAttributes')):
                          $attributes = $connectionError->getAttributes();
                          if (isset($errorMsg['message'])):
                              $errorMsg .= '<br />' . $attributes['message'];
                          endif;
                      endif;
                  }
              ?>
              <?php if ($connected): ?>
                  <p class="alert alert-success">CakePHP is able to connect to the database.</p>
                  <section class="panel">
                    <header class="panel-heading">
                      <?= __('Add User') ?>
                    </header>
                    <div class="panel-body">
                      <div class="position-center">
                        <?= $this->Form->create($role, ['novalidate']); ?>
                        <legend>Create Admin Role</legend>
                        <?php
                        echo $this->Form->input('name', array('class' => 'form-control'));
                        ?>
                        <legend>Create Admin User</legend>
                        <?php
                        echo $this->Form->input('users.0.email', array('class' => 'form-control'));
                        echo $this->Form->input('users.0.password', array('class' => 'form-control'));
                        ?>
                        <hr>
                        <div class="btn-group">
                          <?= $this->Form->button(__('Go !'), ['class' => 'btn btn-success']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                      </div>
                    </div>
                  </section>
              <?php else: ?>
                  <p class="alert alert-warning">CakePHP is NOT able to connect to the database.<br /><br /><?= $errorMsg ?></p>
              <?php endif; ?>
            </div>
          </div>
      </div>

   </div>

</div>

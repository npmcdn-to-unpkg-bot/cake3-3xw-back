<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->fetch('title') ?></title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css('vendor.min.css') ?>
  <?= $this->Html->css('admin.min.css') ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
</head>
<body>
  <div id="wrapper">
    <?= $this->element('header') ?>
    <div class="container-fluid">
      <div class="row" id="content">
        <?= $this->Flash->render() ?>
        <?= $this->Flash->render('auth') ?>
        <?= $this->fetch('content') ?>
      </div>
    </div>
  </div>
  <?= $this->element('footer') ?>
  <?= $this->Html->script('vendor.min.js') ?>
  <?= $this->Html->script('admin.min.js') ?>
  <?= $this->fetch('script') ?>
</body>
</html>

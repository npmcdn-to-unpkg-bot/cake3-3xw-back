<!DOCTYPE html>
<html class="no-js">
<head>
  <?= $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="3xW">

  <?= $this->fetch('meta') ?>

  <title>3xW - <?= $this->fetch('title') ?></title>

  <?= $this->Html->meta('icon') ?>
  <!--Core CSS -->
  <?= $this->Html->css(['vendor.min.css','app.min.css']) ?>
  <!-- context css -->
  <?= $this->fetch('css'); ?>

</head>

<body class="login-body">

  <div class="container">
    <!--[if lt IE 11]>
    <div class="container">
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
  </div>
  <![endif]-->
  <?= $this->Flash->render() ?>
  <?= $this->Flash->render('auth') ?>
  <?= $this->fetch('content') ?>

</div>

<!--Core js-->
<?= $this->Html->script(['vendor.min.js','app.min.js']) ?>
<?= $this->fetch('script') ?>
</body>
</html>

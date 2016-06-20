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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <!-- context css -->
   <?= $this->fetch('css'); ?>

</head>
<body>
   <!--[if lt IE 11]>
   <div class="container">
   <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
</div>
<![endif]-->
<!--main content start-->
<div id="main">
   <div class="menu">
      <?=$this->element('menu')?>
   </div>
   <div class="flash-message">
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
   </div>
   <div class="content">
      <?= $this->fetch('content') ?>
   </div>
</div>
<!--Core js-->
<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?= $this->Html->script([]) ?>
<?= $this->fetch('script') ?>
</body>
</html>

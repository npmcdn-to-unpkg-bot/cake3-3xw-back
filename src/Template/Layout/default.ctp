<!DOCTYPE html>
<html class="no-js">
<head>
   <?= $this->Html->charset() ?>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="author" content="3xW">

   <?= $this->fetch('meta') ?>

   <title><?=$website['name']?> - <?=$this->fetch('title') ?></title>

   <?= $this->Html->meta('icon') ?>
   <!--Core CSS -->
   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
   <?php echo $this->Html->css(['bootstrap.min','font-awesome.min']);?>
   <!-- context css -->
   <?= $this->fetch('css'); ?>

</head>
<body>
   <!--[if lt IE 11]>
   <div class="container">
   <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
</div>
<![endif]-->
<div class="wrapper">
   <!--main content start-->
   <?=$this->cell('Menu', array('website'=>$website))?>
   <? //$this->cell('Slider')?>

   <div class="flash-message">
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
   </div>
   <div class="container main">
      <?= $this->fetch('content') ?>
   </div>
   <div class="footer">
      <?=$this->element('footer')?>
   </div>
</div>


<!--Core js-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
<?= $this->fetch('script') ?>
<?= $this->fetch('scriptBottom');?>
<?= $this->element('googleAnalytics')?>
</body>
</html>

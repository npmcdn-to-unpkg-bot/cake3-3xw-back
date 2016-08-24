<footer>
  <div class="container">
    <?= $this->Image->image(['image' => 'img/logo.png', 'width' => '250'], ['class' => 'img-rsponsive']) ?>
  </div>
  <div class="subfooter">
    <div class="container">
      <span class="pull-right">
        © <?= date('Y') ?>
        graphisme <?= $this->Html->link('WGR', 'http://wgrcommunication.ch', ['target' => '_blank']) ?> |
        web <?= $this->Html->link('3xW', 'http://3xw.ch', ['target' => '_blank']) ?>
      </span>
    </div>
  </div>
</footer>

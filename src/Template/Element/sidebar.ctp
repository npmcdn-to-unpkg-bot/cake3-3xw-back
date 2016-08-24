<aside class="sidebar <?= ($hidden == true)? 'hidden' : '' ?>" style="<?= ($hidden == false)? 'opacity:1 !important;' : '' ?>">
  <div class="sidebar-highlight-block">
    <h4>Activités</h4>
    <p>
      Sed posuere consectetur est at lobortis. Nullam quis risus eget urna mollis ornare vel eu leo.
    </p>
  </div>
  <div class="sidebar-default-block">
    <?= $this->Image->image([ 'image' => 'img/side-1.png', 'width' => '400', 'cropratio' => '16:9'], ['class' => 'img-responsive']) ?>
    <div class="sidebar-default-block-content">
      <h3>PARCOURS MUSÉES</h3>
      <p>
        Nulla vitae elit libero, a pharetra augue.
      </p>
    </div>
  </div>
</aside>

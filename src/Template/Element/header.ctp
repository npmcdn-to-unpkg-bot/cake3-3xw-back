<header>
  <nav class="navbar" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= $this->Url->build('/') ?>">
          <?= $this->Image->image(['image' => 'img/logo.png', 'width' => '250'], ['class' => 'img-responsive']) ?>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav lng-nav navbar-right">
          <li class="active">
            <?= $this->Html->link('FR', '#') ?>
          </li>
          <li>
            <?= $this->Html->link('DE', '#') ?>
          </li>
          <li>
            <?= $this->Html->link('EN', '#') ?>
          </li>
        </ul>
        <div class="clearfix"></div>
        <ul class="nav navbar-nav social-nav navbar-right">
          <li>
            <?= $this->Html->link('<i class="fa fa-facebook"></i>', '#', ['escape' => false]) ?>
          </li>
          <li>
            <?= $this->Html->link('<i class="fa fa-instagram"></i>', '#', ['escape' => false]) ?>
          </li>
          <li>
            <?= $this->Html->link('<i class="fa fa-twitter"></i>', '#', ['escape' => false]) ?>
          </li>
          <li>
            <div class="search-box">
              <form>
                <label><i class="fa fa-search"></i></label>
                <input placeholder="Recherche...">
              </form>
            </div>
          </li>
        </ul>
        <div class="clearfix"></div>
        <ul class="nav navbar-nav primary-nav navbar-right">
          <li class="active">
            <?= $this->Html->link('Aujourd\'hui', '/fr_CH') ?>
          </li>
          <li>
            <?= $this->Html->link('Expositions', '#') ?>
          </li>
          <li>
            <?= $this->Html->link('Musées', '/fr_CH/musees') ?>
          </li>
          <li>
            <?= $this->Html->link('Agenda', '/fr_CH/agenda') ?>
          </li>
          <li>
            <?= $this->Html->link('Votre visite', '#') ?>
          </li>
          <li>
            <?= $this->Html->link('Parcours', '#') ?>
          </li>
          <li>
            <?= $this->Html->link('Magazine', '#') ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

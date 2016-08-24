<?php
$menu = [
  'Général' => [
    '<i class="fa fa-user"></i>'.__('Users') => ['controller' => 'users', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-university"></i>'.__('Museums') => ['controller' => 'Museums', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-pie-chart"></i>'.__('Categories') => ['controller' => 'categories', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-map-marker"></i>'.__('POI') => ['controller' => 'pois', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-eye"></i>'.__('Visits') => ['controller' => 'visits', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-tags"></i>'.__('Tags') => ['controller' => 'tags', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-map"></i>'.__('Paths') => ['controller' => 'Paths', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-magic"></i>'.__('Highlights') => ['controller' => 'Highlights', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-newspaper-o"></i>'.__('Site\'s areas') => ['controller' => 'Areas', 'action' => 'index','prefix' => 'admin'],
    '<i class="fa fa-sign-out"></i>'.__('Logout') => ['controller' => 'Users', 'action' => 'logout','prefix' => false, 'plugin' => 'CakeDC/Users'],
  ]
];
?>
<div class="nav-side-menu">

  <!-- BRAND -->
  <div class="brand">Brand Logo</div>
  <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

  <!-- MENU -->
  <div class="menu-list">
    <ul id="menu-content" class="menu-content collapse out">
      <?php
      $menuCount = 0;
      foreach($menu as $header => $mainMenus ){
        echo '<li class="header"><span>'.$header.'</span></li>';
        foreach($mainMenus as $mainMenuLabel => $mainMenuContent ){
          $menuCount++;
          if(array_key_exists('dropdown', $mainMenuContent)) {
            echo '<li  data-toggle="collapse" data-target="#menu-item-'.$menuCount.'" class="collapsed">';
            echo '<a href="#">'.$mainMenuLabel.' <span class="arrow"></span></a>';
            echo '</li>';
            echo '<ul class="sub-menu collapse" id="menu-item-'.$menuCount.'">';
            foreach($mainMenuContent['dropdown'] as $subMenuLabel => $subMenu){
              echo $this->Html->tag('li',$this->Html->link($subMenuLabel, $subMenu, ['escape' => false]));
            }
            echo '</ul>';
          }else{
            echo $this->Html->tag('li',$this->Html->link($mainMenuLabel, $mainMenuContent, ['escape' => false]));
          }
        }
      }
      ?>
    </ul>
  </div>
</div>

<!-- HEADER -->
<div id="page-header" class="bg-gradient-9">
  <div class="container">
    <div class="pull-right">
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <?= $this->request->session()->read('Auth.User.first_name').' '.$this->request->session()->read('Auth.User.last_name') ?>
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
          <li role="separator" class="divider"></li>
          <li>
            <?= $this->Html->link('<i class="fa fa-sign-out" aria-hidden="true"></i> logout','/logout',['escape' => false]) ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

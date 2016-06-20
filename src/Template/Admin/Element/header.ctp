<!--header start-->
<header class="header fixed-top clearfix">
   <!--logo start-->
   <div class="brand">
      <?php echo $this->Html->link($this->Html->image('logo.png', ['id'=>'logo']),'/',array('escape' => false,'class' => 'logo', 'target'=>'_blank')); ?>
      <div class="sidebar-toggle-box">
         <div class="fa fa-bars"></div>
      </div>
   </div>
   <!--logo end-->
   <div class="nav notify-row" id="top_menu">
      <!--  notification start -->
      <ul class="nav top-menu">


      </ul>
      <!--  notification end -->
   </div>
   <div class="top-nav clearfix">
      <!--search & user info start-->
      <ul class="nav pull-right top-menu">
         <!-- user login dropdown start-->
         <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
               <i class="fa fa-user"></i>
               <span class="username"><?= $connected['email']?></span>
               <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
               <li><a href="<?=$this->Url->build(['controller' => 'Users','action' => 'my_profile']);?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
               <li><a href="<?=$this->Url->build(['controller' => 'Users','action' => 'change_password']);?>"><i class="fa fa-cog"></i> Change Password</a></li>
               <li><a href="<?=$this->Url->build(['controller' => 'Users','action' => 'logout','prefix'=>false]);?>"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
         </li>
         <!-- user login dropdown end -->
      </ul>
      <!--search & user info end-->
   </div>

</header>
<!--header end-->

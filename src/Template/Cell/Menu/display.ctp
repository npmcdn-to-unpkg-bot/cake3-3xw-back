<div class="navbar-wrapper">
   <nav class="navbar navbar-default">
      <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=$this->Url->build('/')?>"><?=$website['name']?></a>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <?php foreach ($menu as $page): ?>
                  <?php if (empty($page->child_pages)): ?>
                     <li class="">
                        <?php if ($page->homepage){
                           $link = "/";
                        }else{
                           $link = "/".$page->slug;
                        }?>
                        <?= $this->Html->link($page->name, $link)?>
                     </li>
                  <?php else:?>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$page->name?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><?= $this->Html->link($page->name, "/".$page->slug)?></li>
                           <?php foreach ($page->child_pages as $child): ?>
                              <li class="">
                                 <?= $this->Html->link($child->name,  "/".$child->slug)?>
                              </li>
                           <?php endforeach; ?>
                        </ul>
                     </li>
                  <?php endif;?>
               <?php endforeach; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <?php foreach ($right_menu as $page): ?>
                  <?php if (empty($page->child_pages)): ?>
                     <li class="">
                        <?php if ($page->homepage){
                           $link = "/";
                        }else{
                           $link = "/".$page->slug;
                        }?>
                        <?= $this->Html->link($page->name, $link)?>
                     </li>
                  <?php else:?>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$page->name?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><?= $this->Html->link($page->name, "/".$page->slug)?></li>
                           <?php foreach ($page->child_pages as $child): ?>
                              <li class="">
                                 <?= $this->Html->link($child->name,  "/".$child->slug)?>
                              </li>
                           <?php endforeach; ?>
                        </ul>
                     </li>
                  <?php endif;?>
               <?php endforeach; ?>
            </ul>
         </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
   </nav>
</div>

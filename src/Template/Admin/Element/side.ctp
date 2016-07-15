<?php
/* BACKEND MENU
 * ******************************* */
$menu = array(
    '<i class="fa fa-dashboard"></i><span>'.__('Dashboard').'</span>' => array('controller' => 'dashboard', 'action' => 'index'),
    '<i class="fa fa-file-text"></i><span>'.__('Pages').'</span>' => array('controller' => 'pages', 'action' => 'index'),

    '<i class="fa fa-file-video-o"></i><span>'.__('Attachments').'</span>' => array(
        'dropdown' => array(
          __('List') => array('controller' => 'attachments', 'action' => 'index'),
          __('Tags') => array('controller' => 'atags', 'action' => 'index'),
        )
    ),
    '<i class="fa fa-users"></i><span>'.__('Users').'</span>' => array(
        'dropdown' => array(
          __('Users') => array('controller' => 'users', 'action' => 'index'),
          __('Roles') => array('controller' => 'roles', 'action' => 'index'),
        )
    ),
    '<i class="fa fa-gears"></i><span>'.__('Parameters').'</span>' => array(
        'dropdown' => array(
          __('Block Types') => array('controller' => 'block_types', 'action' => 'index'),
          __('Clear Cache') => array('controller' => 'dashboard', 'action' => 'clearCache'),
          __('Website') => array('controller' => 'website', 'action' => 'view'),


        )
    ),
);
?>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
              <?php
              foreach ($menu as $linkName => $link) {
                if (array_key_exists('dropdown', $link)) {
                    $d = '';
                    foreach ($link['dropdown'] as $dropName => $dropLink) {
                        $d .= $this->Html->tag('li', $this->Html->link($dropName, $dropLink,array('escape' => false)));
                    }
                    $html = '<a href="javascript:;">' . $linkName . '<span class="dcjq-icon"></span></a>';
                    $html .= $this->Html->tag('ul', $d, array('class' => 'sub'));
                    echo $this->Html->tag('li', $html, array('class' => 'sub-menu'));
                } else {
                    echo $this->Html->tag('li', $this->Html->link($linkName, $link,array('escape' => false)));
                }
              }
              ?>
            </ul>
          </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
* Menu cell
*/
class MenuCell extends Cell
{

   /**
   * List of valid options that can be passed into this
   * cell's constructor.
   *
   * @var array
   */
   protected $_validCellOptions = [];

   /**
   * Default display method.
   *
   * @return void
   */
   public function display()
   {
      $this->loadModel('Website');
      $this->loadModel('Pages');
      $pages = $this->Pages->find('all',[
         'conditions'=>[
            'Pages.active'=>true,
            'Pages.main_menu'=>true,
            'Pages.parent_id IS NULL'
         ],
         'contain' => ['ChildPages'],
         'order'=>['Pages.main_menu_order'=>'ASC']
      ])->cache('menu');

      $right_menu = $this->Pages->find('all',[
         'conditions'=>[
            'Pages.active'=>true,
            'Pages.right_menu'=>true,
            'Pages.parent_id IS NULL'
         ],
         'contain' => ['ChildPages'],
         'order'=>['Pages.main_menu_order'=>'ASC']
      ])->cache('right_menu');

      $website = $this->Website->find()->cache('website_menu_name');
      if($website->isEmpty()){
         $website = array();
         $website['name'] = 'configure it';
      }else{
          $website = $website->first()->toArray();
      }
      $this->set('website',$website);
      $this->set('menu', $pages);
      $this->set('right_menu', $right_menu);
   }
}

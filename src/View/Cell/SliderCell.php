<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Slider cell
 */
class SliderCell extends Cell
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
      $this->loadModel('Blocks');
      if($this->request->action == 'homepage'){
         $this->loadModel('Pages');
         $page = $this->Pages->find('all',[
            'conditions'=>['Pages.homepage'=>true]
         ])->cache('homepage_id');
         $page_id = $page->first()->id;
      }else{
         $this->loadModel('Pages');
         $page = $this->Pages->find('all',[
            'conditions'=>['Pages.slug'=>$this->request->pass[0], 'Pages.active'=>true],
            'fields'=>['id']
         ])->cache('page_slug_to_id_'.$this->request->pass[0]);
         $page_id = $page->toArray()[0]['id'];
      }
      $block = $this->Blocks->find('all',[
         'conditions'=>[
            'Blocks.page_id'=> $page_id,
            'Blocks.block_type_id'=>3
         ],
         'contain'=>['Attachments']
      ])->cache('slider_'.$page_id);
      $this->set('slider',$block);

    }
}

<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
* Blocks Controller
*
* @property \App\Model\Table\BlocksTable $Blocks
*/
class BlocksController extends AppController
{

   /**
   * Index method
   *
   * @return void
   */
   public function index()
   {
      $this->paginate = [
         'contain' => ['BlockTypes', 'Pages']
      ];
      $this->set('blocks', $this->paginate($this->Blocks));
      $this->set('_serialize', ['blocks']);
   }

   /**
   * View method
   *
   * @param string|null $id Block id.
   * @return void
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function view($id = null)
   {
      $block = $this->Blocks->get($id, [
         'contain' => ['BlockTypes', 'Pages', 'Attachments']
      ]);

      $this->set('block', $block);
      $this->set('_serialize', ['block']);
   }

   /**
   * Add method
   *
   * @return void Redirects on successful add, renders view otherwise.
   */
   public function add($block_type_id, $page_id)
   {
      $block = $this->Blocks->newEntity();
      if ($this->request->is('post')) {
         $block = $this->Blocks->patchEntity($block, $this->request->data);
         $block->page_id = $page_id;
         $block->block_type_id = $block_type_id;
         if ($this->Blocks->save($block)) {
            $this->Flash->success(__('The block has been saved.'));
            return $this->redirect(['controller'=>'pages','action' => 'view', $page_id]);
         } else {
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
         }
      }
      $blockTypes = $this->Blocks->BlockTypes->find('list', ['limit' => 200]);
      $pages = $this->Blocks->Pages->find('list', ['limit' => 200]);
      $attachments = $this->Blocks->Attachments->find('list', ['limit' => 200]);
      $this->set(compact('block', 'blockTypes', 'pages', 'attachments'));
      $this->set('_serialize', ['block']);

      switch ($block_type_id) {
         case 1:
         $this->render('add_text');
         break;

         case 2:
         $this->render('add_img');
         break;


         case 3:
         $this->render('add_img');
         break;

         case 4:
         $this->render('add_partners');
         break;

         default:
         # code...
         $this->render('add_text');
         break;
      }
   }

   /**
   * Edit method
   *
   * @param string|null $id Block id.
   * @return void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function edit($id, $block_type_id, $page_id)
   {
      $block = $this->Blocks->get($id, [
         'contain' => ['Attachments'],
         'finder' => 'translations'
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
         $block = $this->Blocks->patchEntity($block, $this->request->data);
         if ($this->Blocks->save($block)) {
            $this->Flash->success(__('The block has been saved.'));
            return $this->redirect(['controller'=>'pages','action' => 'view', $block->page_id]);
         } else {
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
         }
      }
      $blockTypes = $this->Blocks->BlockTypes->find('list', ['limit' => 200]);
      $pages = $this->Blocks->Pages->find('list', ['limit' => 200]);
      $attachments = $this->Blocks->Attachments->find('list', ['limit' => 200]);
      $this->set(compact('block', 'blockTypes', 'pages', 'attachments'));
      $this->set('_serialize', ['block']);
      switch ($block_type_id) {
         case 1:
         $this->render('add_text');
         break;
         case 2:
         $this->render('edit_img');
         break;

         case 3:
         $this->render('edit_img');
         break;

         default:
         # code...
         $this->render('add_text');
         break;
      }
   }

   /**
   * Delete method
   *
   * @param string|null $id Block id.
   * @return \Cake\Network\Response|null Redirects to index.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
   public function delete($id = null)
   {
      $this->request->allowMethod(['post', 'delete']);
      $block = $this->Blocks->get($id);
      if ($this->Blocks->delete($block)) {
         $this->Flash->success(__('The block has been deleted.'));
         return $this->redirect(['controller'=>'pages','action' => 'view', $block->page_id]);
      } else {
         $this->Flash->error(__('The block could not be deleted. Please, try again.'));
      }
      //  return $this->redirect(['action' => 'index']);
   }
}

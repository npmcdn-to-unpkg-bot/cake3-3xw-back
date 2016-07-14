<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BlockTypes Controller
 *
 * @property \App\Model\Table\BlockTypesTable $BlockTypes
 */
class BlockTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('blockTypes', $this->paginate($this->BlockTypes));
        $this->set('_serialize', ['blockTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Block Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blockType = $this->BlockTypes->get($id, [
            'contain' => ['Blocks']
        ]);
        $this->set('blockType', $blockType);
        $this->set('_serialize', ['blockType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blockType = $this->BlockTypes->newEntity();
        if ($this->request->is('post')) {
            $blockType = $this->BlockTypes->patchEntity($blockType, $this->request->data);
            if ($this->BlockTypes->save($blockType)) {
                $this->Flash->success(__('The block type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The block type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('blockType'));
        $this->set('_serialize', ['blockType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Block Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blockType = $this->BlockTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blockType = $this->BlockTypes->patchEntity($blockType, $this->request->data);
            if ($this->BlockTypes->save($blockType)) {
                $this->Flash->success(__('The block type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The block type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('blockType'));
        $this->set('_serialize', ['blockType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Block Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blockType = $this->BlockTypes->get($id);
        if ($this->BlockTypes->delete($blockType)) {
            $this->Flash->success(__('The block type has been deleted.'));
        } else {
            $this->Flash->error(__('The block type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

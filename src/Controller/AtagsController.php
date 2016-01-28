<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Atags Controller
 *
 * @property \App\Model\Table\AtagsTable $Atags
 */
class AtagsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('atags', $this->paginate($this->Atags));
        $this->set('_serialize', ['atags']);
    }

    /**
     * View method
     *
     * @param string|null $id Atag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atag = $this->Atags->get($id, [
            'contain' => ['Attachments']
        ]);
        $this->set('atag', $atag);
        $this->set('_serialize', ['atag']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atag = $this->Atags->newEntity();
        if ($this->request->is('post')) {
            $atag = $this->Atags->patchEntity($atag, $this->request->data);
            if ($this->Atags->save($atag)) {
                $this->Flash->success('The atag has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The atag could not be saved. Please, try again.');
            }
        }
        $attachments = $this->Atags->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('atag', 'attachments'));
        $this->set('_serialize', ['atag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Atag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atag = $this->Atags->get($id, [
            'contain' => ['Attachments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atag = $this->Atags->patchEntity($atag, $this->request->data);
            if ($this->Atags->save($atag)) {
                $this->Flash->success('The atag has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The atag could not be saved. Please, try again.');
            }
        }
        $attachments = $this->Atags->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('atag', 'attachments'));
        $this->set('_serialize', ['atag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Atag id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atag = $this->Atags->get($id);
        if ($this->Atags->delete($atag)) {
            $this->Flash->success('The atag has been deleted.');
        } else {
            $this->Flash->error('The atag could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}

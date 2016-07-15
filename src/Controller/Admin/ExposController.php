<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Expos Controller
 *
 * @property \App\Model\Table\ExposTable $Expos
 */
class ExposController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('expos', $this->paginate($this->Expos));
        $this->set('_serialize', ['expos']);
    }

    /**
     * View method
     *
     * @param string|null $id Expo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view()
    {
        $expo = $this->Expos->find('all')->first();
        //debug($expo);
        if(empty($expo)){
           return $this->redirect(['action' => 'add']);
        }
        $this->set('expo', $expo);
        $this->set('_serialize', ['expo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expo = $this->Expos->newEntity();
        if ($this->request->is('post')) {
            $expo = $this->Expos->patchEntity($expo, $this->request->data);
            if ($this->Expos->save($expo)) {
                $this->Flash->success(__('The expo has been saved.'));
                return $this->redirect(['action' => 'view']);
            } else {
                $this->Flash->error(__('The expo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('expo'));
        $this->set('_serialize', ['expo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expo = $this->Expos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expo = $this->Expos->patchEntity($expo, $this->request->data);
            if ($this->Expos->save($expo)) {
                $this->Flash->success(__('The expo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The expo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('expo'));
        $this->set('_serialize', ['expo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expo = $this->Expos->get($id);
        if ($this->Expos->delete($expo)) {
            $this->Flash->success(__('The expo has been deleted.'));
        } else {
            $this->Flash->error(__('The expo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

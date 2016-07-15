<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Website Controller
 *
 * @property \App\Model\Table\WebsiteTable $Website
 */
class WebsiteController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Website id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view()
    {
        $website = $this->Website->find('all');
        //debug($website);
        if($website->isEmpty()){
           $this->Flash->success(__('You have to create it !'));
           return $this->redirect(['action' => 'add']);
        }

        $this->set('website', $website->first());
        $this->set('_serialize', ['website']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $website = $this->Website->newEntity();
        if ($this->request->is('post')) {
            $website = $this->Website->patchEntity($website, $this->request->data);
            if ($this->Website->save($website)) {
                $this->Flash->success(__('The website has been saved.'));
                return $this->redirect(['action' => 'view']);
            } else {
                $this->Flash->error(__('The website could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('website'));
        $this->set('_serialize', ['website']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Website id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $website = $this->Website->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $website = $this->Website->patchEntity($website, $this->request->data);
            if ($this->Website->save($website)) {
                $this->Flash->success(__('The website has been saved.'));
                return $this->redirect(['action' => 'view']);
            } else {
                $this->Flash->error(__('The website could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('website'));
        $this->set('_serialize', ['website']);
    }
}

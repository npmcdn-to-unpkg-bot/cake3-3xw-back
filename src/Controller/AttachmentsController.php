<?php
namespace App\Controller;

use Cake\Utility\Inflector;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\Log\Log;

class AttachmentsController extends AppController
{

  public function download($id)
  {
    $attachment = $this->Attachments->get($id);
    // a view.
    $this->response->file(
      $attachment['path'],
      ['download' => true]
    );
    return $this->response;
  }

  // delivers uploadmany template
  public function uploadmany(){}

  // delivers embed template
  public function embed(){}

    // delivers browse template
    public function browse(){ $this->index();}

    // store embed and files
    public function upload()
    {
      $response = ['status' => 0];
      $attachment = $this->Attachments->newEntity();

      if ($this->request->is('post'))
      {
        $attachment = $this->Attachments->patchEntity($attachment, $this->request->data);
        $query = $this->Attachments->save($attachment);
        if($query)
        {
          $response = ['status' => 1,'attachment' => $query ];
        }else
        {
          $response['errors'] = $attachment->errors();
        }

        $this->set('data', $response);
        $this->viewBuilder()->layout('ajax');
        $this->render('/Common/ajax');
      }
    }

    public function index()
    {
      // upload settings
      $settings = array_merge( Configure::read('Storage.settings'), $this->Attachments->behaviors()->Storage->config());

      // subtypes
      $subtypes = $this->Attachments->find('all',[
        'fields' => ['DISTINCT Attachments.subtype'],
        'order' => 'subtype ASC'
      ]);

      // sort and filters
      $filter = $sort = '';

      // set basic query
      $query = $this->Attachments->find('all');

      // search
      if(!empty($this->request->query['search'])){
        $query->where([
          'or' => [
            'name like' => '%'.$this->request->query['search'].'%',
            'title like' => '%'.$this->request->query['search'].'%'
          ]
        ]);
        $filter = 'look for files matching: "'.$this->request->query['search'].'"';
      }

      // subtype
      if(!empty($this->request->query['filter'])){
        $query->where([
          'subtype' => $this->request->query['filter']
        ]);
        $filter = 'files of type: "'.$this->request->query['filter'].'"';
      }

      // tags
      if(!empty($this->request->query['tags']))
      {
        $tags = $this->request->query['tags'];
        $query->contain(['Atags'])
        ->matching('Atags');
        foreach( $tags as $tag)
        {
          $query->where([
            'Atags.slug like' => '%'.Inflector::slug($tag).'%'
          ]);
        }
        $filter = 'files with associated tags: "'.implode(' + ',$tags).'"';
      }

      // sort
      if(!empty($this->request->query['sort'])){
        $query->order([ 'Attachments.'.$this->request->query['sort'] => $this->request->query['direction']]);
        $sort = 'by: "'.$this->request->query['sort'].'" '.$this->request->query['direction'];
      }else{
        $query->order(['Attachments.created' => 'DESC']);
      }

      // collect data
      $attachments = $this->paginate($query);

      // set view vars
      $this->set(compact('attachments','settings','subtypes','filter','sort'));
      $this->set('_serialize', ['attachments','settings','subtypes','filter','sort']);
    }


    public function edit($id = null)
    {
      $attachment = $this->Attachments->get($id, [
        'contain' => ['Atags']
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        //debug($this->request->data);
        $attachment = $this->Attachments->patchEntity($attachment, $this->request->data);
        if ($this->Attachments->save($attachment)) {
          $this->Flash->success('The attachment has been saved.');
          return $this->redirect(['action' => 'index']);
        } else {
          $this->Flash->error('The attachment could not be saved. Please, try again.');
        }
        
      }
      $this->set(compact('attachment'));
      $this->set('_serialize', ['attachment']);
    }

    public function delete($id = null)
    {
      $this->request->allowMethod(['post', 'delete']);
      $attachment = $this->Attachments->get($id);
      if ($this->Attachments->delete($attachment)) {
        $this->Flash->success('The attachment has been deleted.');
      } else {
        $this->Flash->error('The attachment could not be deleted. Please, try again.');
      }
      return $this->redirect(['action' => 'index']);
    }
  }

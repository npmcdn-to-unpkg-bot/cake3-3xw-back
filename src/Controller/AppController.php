<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\I18n\I18n;

class AppController extends Controller
{

  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('CakeDC/Users.UsersAuth');
  }

  public function beforeFilter(Event $event)
  {
    // auth
    if (empty($this->request->params['prefix']))
    {
      if( !empty($this->request->params['plugin']) && $this->request->params['plugin'] == 'CakeDC/Users')
      {
        $this->Auth->allow('login','register');
      }else
      {
        $this->Auth->allow();
      }
    }else
    {
      $this->Auth->allow('login','register');
    }
    $lng = isset($this->request->params['lang'])? $this->request->params['lang'] : Configure::read('App.defaultLocale');
    I18n::locale($lng);
  }

  public function beforeRender(Event $event)
  {

    if (!array_key_exists('_serialize', $this->viewVars) &&
    in_array($this->response->type(), ['application/json', 'application/xml'])
    ) {
      $this->set('_serialize', true);
    }

    $this->set("referer", $this->referer());
    $this->response->header('Access-Control-Allow-Origin', '*');
  }

  public function beforeDispatch(Event $event)
  {
    die('hey');
  }
}

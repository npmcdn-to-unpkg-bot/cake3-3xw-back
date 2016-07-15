<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link      http://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;


/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{

   /**
   * Initialization hook method.
   *
   * Use this method to add common initialization code like loading components.
   *
   * e.g. `$this->loadComponent('Security');`
   *
   * @return void
   */
   public function initialize()
   {
      parent::initialize();
      $this->session = $this->request->session();
      $this->loadComponent('RequestHandler');
      $this->loadComponent('Flash');
      $this->loadComponent('Auth',
      [
         'authenticate' => [
            'Form' => [
               'fields' => ['username' => 'email']
            ]
         ],
         'loginAction' => [
            'controller' => 'Users',
            'action' => 'login',
            'prefix'=>false
         ],
         'logoutRedirect' => [
            'controller' => 'Pages',
            'action' => 'display',
            'home',
            'prefix'=>false
         ],
         'authError' => 'You are not authorized to do this!',
         'authRedirect'=>['controller'=>'users', 'action'=>'dashboard'],
         'storage' => 'Session'
      ]
   );
}

public function beforeFilter(Event $event)
{
   $this->Auth->allow(['display', 'login']);
   if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
      $this->set('connected', $this->Auth->user());
      $this->session->write('Config.language', 'fr_CH');
      I18n::locale('fr_CH');
      $this->set('lang', 'fr_CH');
      $this->viewBuilder()->layout('admin');
   }else{
      if ($this->session->check('Config.language')) {
         I18n::locale($this->session->read('Config.language'));
         $this->set('lang', $this->session->read('Config.language'));
      }else{
         $this->session->write('Config.language', 'fr_CH');
         I18n::locale('fr_CH');
         $this->set('lang', 'fr_CH');
      }
      $this->viewBuilder()->layout('default');
   }


}

public function lang($lang)
{
   $this->session->write('Config.language', $lang);
   $this->redirect($this->referer());
}


/**
* Before render callback.
*
* @param \Cake\Event\Event $event The beforeRender event.
* @return void
*/
public function beforeRender(Event $event)
{
   if (!array_key_exists('_serialize', $this->viewVars) &&
   in_array($this->response->type(), ['application/json', 'application/xml'])
   ) {
      $this->set('_serialize', true);
   }
   $this->set("referer", $this->referer());
   if($this->request->is('ajax')){
      $this->viewBuilder()->layout('ajax');
   }
   $this->response->header('Access-Control-Allow-Origin', '*');

   //$this->set('website');
}


public function isAuthorized($user)
{
   if (isset($user['role_id'])){
      switch ($user['role_id']) {
         case 1:
         return true;
         break;
         default:
         return false;
         break;
      }
   }else{
      return false;
   }

}

}

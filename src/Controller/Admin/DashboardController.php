<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Cache\Cache;


/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\DashboardTable $Dashboard
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

    }

    public function clearCache()
   {
      Cache::clearAll();
      $this->Flash->success(__('The cache has been cleared.'));
      return $this->redirect($this->referer());
   }

}

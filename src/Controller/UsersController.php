<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
{



   public function login()
   {
      $this->viewBuilder()->layout('login');
      if ($this->request->is('post')) {
         $user = $this->Auth->identify();
         //debug($user);
         if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect(['controller'=>'dashboard', 'action'=>'index', 'prefix'=>'admin']);
         }
         $this->Flash->error(__("Invalid username or password"));
      }

   }


   public function redirectLogin($user){
      return $this->redirect(['controller'=>'dashboard', 'action'=>'index', 'prefix'=>'admin']);


      switch ($user['role_id']) {
         case 1:
            # admin

            break;
         default:
            # code...
            break;
      }

   }


   public function logout()
   {
      $this->redirect($this->Auth->logout());
   }


   public function recover()
   {
      if ($this->request->is('post')) {
         $test_user = $this->Users->findByEmail($this->request->data['email']);
         if (!empty($test_user->first())) {
            //set new password
            $user = $this->Users->get($test_user->first()->id);
            $new_password = $this->_generatePassword();
            $user->password = $new_password;
            $this->Users->save($user);
            //mail

            Email::configTransport('mandril', [
               'className' => 'SMTP',
               'host' => 'smtp.mandrillapp.com',
               'port' => 587,
               'timeout' => 30,
               'username' => 'info@3xw.ch',
               'password' => 'S0OBVHClhAz4v5vvp2cR5Q',
               'client' => null,
               'tls' => null
            ]);
            $email = new Email(['from' => 'no-reply@3xw.ch', 'transport' =>'mandril']);

            //$email = new Email('DoubleV.default');
            $email->to($user->email, 'DoubleV Master');
            $email->subject('Changement de mot de passe');
            $email->emailFormat('html');
            $email->template('DoubleV.recover');
            $email->viewVars(array('user' => $user->username, 'password' => $new_password));
            $email->send();
            $this->Flash->success('New password sent !');
            return $this->redirect(array('action' => 'login'));
         } else {
            $this->Flash->error(__('Pas trouvé :-/'));
            return $this->redirect(array('action' => 'login'));
         }
      }
   }

   /**
   * génération du password
   */
   private function _generatePassword($length = 8)
   {
      $password = "";
      $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
      $maxlength = strlen($possible);
      if ($length > $maxlength) {
         $length = $maxlength;
      }
      $i = 0;
      while ($i < $length) {
         $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
         if (!strstr($password, $char)) {
            $password .= $char;
            $i++;
         }
      }
      return $password;
   }

}

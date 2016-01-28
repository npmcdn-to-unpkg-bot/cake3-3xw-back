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

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'FileStorage']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                        $this->Auth->setUser($user);
                        return $this->redirect(['controller'=>'users', 'action'=>'index']);
                }
                $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau."));
        }

    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }

    public function dashboard(){

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

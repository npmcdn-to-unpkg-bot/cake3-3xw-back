<?php
namespace App\Shell;

use Cake\Console\Shell;

class SetupShell extends Shell
{
   public function initialize()
    {
        parent::initialize();
        $this->loadModel('Roles');
        $this->loadModel('Users');
    }

    public function main()
    {
      $role_name = $this->in('Enter the admin role name');
      $role = $this->Roles->newEntity();
      $role->name = $role_name;
      if ($this->Roles->save($role)) {
         $this->out('You have created a new role !');
         $user = $this->Users->newEntity();
         $user->email = $this->in('Enter the admin email');
         $user->password = $this->in('Enter the admin passord');
         $user->role_id = $role->id;
         if ($this->Users->save($user)) {
            $this->clear();
            $this->out('You have created a new user ! ');
            $this->hr();
            $this->out('You are now ready to connect to your backoffice ! ');
            $this->hr();
            $this->out('http://YourAppName/admin');
            $this->hr();
            $this->out('Username : '.$user->email);
         }else{
            $this->err('The user has not been created :-(');
         }
      } else {
         $this->err('The role has not been created :-(');
      }
    }
}

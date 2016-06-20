<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DigestAuthenticate;
use Cake\Event\Event;



/**
* Users Model
*/
class UsersTable extends Table
{

   /**
   * Initialize method
   *
   * @param array $config The configuration for the Table.
   * @return void
   */
   public function initialize(array $config)
   {
      $this->table('users');
      $this->displayField('id');
      $this->primaryKey('id');
      $this->addBehavior('Timestamp');
      $this->belongsTo('Roles', [
         'foreignKey' => 'role_id',
         'joinType' => 'INNER'
      ]);
   }

   /**
   * Default validation rules.
   *
   * @param \Cake\Validation\Validator $validator Validator instance.
   * @return \Cake\Validation\Validator
   */
   public function validationDefault(Validator $validator)
   {
      $validator
      ->add('id', 'valid', ['rule' => 'numeric'])
      ->allowEmpty('id', 'create')
      ->add('email', 'valid', ['rule' => 'email'])
      ->requirePresence('email', 'create')
      ->notEmpty('email')
      ->requirePresence('password', 'create')
      ->notEmpty('password')
      ->allowEmpty('digest_pass');

      return $validator;
   }


   public function validationPassword(Validator $validator)
   {
      $validator
      ->add('password', 'notBlank', [
         'rule' => 'notBlank',
         'message' => __('You need to provide a new password'),
      ])
      ->add('re-password', [
         'compare' => [
            'rule' => ['compareWith','password'],
            'message' => 'Confirm Password does not match with Password.'
            ]])
            ->requirePresence('re-password')
            ->notEmpty('re-password','Please enter Confirm Password')
            ;
            return $validator;
         }


         /**
         * Returns a rules checker object that will be used for validating
         * application integrity.
         *
         * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
         * @return \Cake\ORM\RulesChecker
         */
         public function buildRules(RulesChecker $rules)
         {
            $rules->add($rules->isUnique(['email']));
            $rules->add($rules->existsIn(['role_id'], 'Roles'));
            return $rules;
         }

         public function beforeSave(Event $event)
         {
            $entity = $event->data['entity'];

            // Make a password for digest auth.
            $entity->digest_pass = DigestAuthenticate::password(
            $entity->email,
            $entity->password,
            'PAN-point-PAN-point-point-PAN-point-fffff'
         );
         return true;
      }
   }

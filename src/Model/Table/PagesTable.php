<?php
namespace App\Model\Table;
use ArrayObject;
use Cake\Utility\Inflector;

use App\Model\Entity\Page;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
* Pages Model
*
* @property \Cake\ORM\Association\BelongsTo $ParentPages
* @property \Cake\ORM\Association\HasMany $Blocks
* @property \Cake\ORM\Association\HasMany $ChildPages
*/
class PagesTable extends Table
{

   /**
   * Initialize method
   *
   * @param array $config The configuration for the Table.
   * @return void
   */
   public function initialize(array $config)
   {
      parent::initialize($config);

      $this->table('pages');
      $this->displayField('name');
      $this->primaryKey('id');

      $this->addBehavior('Tree');

      $this->belongsTo('ParentPages', [
         'className' => 'Pages',
         'foreignKey' => 'parent_id'
      ]);
      $this->hasMany('Blocks', [
         'foreignKey' => 'page_id'
      ]);
      $this->hasMany('ChildPages', [
         'className' => 'Pages',
         'foreignKey' => 'parent_id'
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
      ->integer('id')
      ->allowEmpty('id', 'create');

      $validator
      ->boolean('active')
      ->allowEmpty('active');

      $validator
      ->boolean('main_menu')
      ->allowEmpty('main_menu');

      $validator
      ->boolean('right_menu')
      ->allowEmpty('right_menu');

      $validator
      ->integer('main_menu_order')
      ->allowEmpty('main_menu_order');

      $validator
      ->requirePresence('name', 'create')
      ->notEmpty('name');

      $validator
      ->integer('lft')
      ->allowEmpty('lft');

      $validator
      ->integer('rght')
      ->allowEmpty('rght');

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
      $rules->add($rules->existsIn(['parent_id'], 'ParentPages'));
      $rules->add($rules->isUnique(['slug']));
      return $rules;
   }

   public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
   {
      if(empty($data['slug']) && !empty($data['name']))
      {
         $data['slug'] = Inflector::slug($data['name']);
      }
   }

}

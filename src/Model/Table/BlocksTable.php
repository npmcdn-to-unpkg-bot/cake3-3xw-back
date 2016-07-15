<?php
namespace App\Model\Table;

use App\Model\Entity\Block;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Behavior\CustomTranslateTrait;




/**
 * Blocks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BlockTypes
 * @property \Cake\ORM\Association\BelongsTo $Pages
 * @property \Cake\ORM\Association\BelongsToMany $Attachments
 */
class BlocksTable extends Table
{
   use CacheTrait;
   use CustomTranslateTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Translate', ['fields' => ['content']]);

        $this->table('blocks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BlockTypes', [
            'foreignKey' => 'block_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pages', [
            'foreignKey' => 'page_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Attachments', [
            'foreignKey' => 'block_id',
            'targetForeignKey' => 'attachment_id',
            'joinTable' => 'blocks_attachments'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('content');

        $validator
            ->allowEmpty('size');

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
        $rules->add($rules->existsIn(['block_type_id'], 'BlockTypes'));
        $rules->add($rules->existsIn(['page_id'], 'Pages'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BoardsUsers Model
 *
 * @property \App\Model\Table\BoardsTable|\Cake\ORM\Association\BelongsTo $Boards
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BoardsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\BoardsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BoardsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BoardsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BoardsUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BoardsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BoardsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BoardsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class BoardsUsersTable extends Table
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

        $this->setTable('boards_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Boards', [
            'foreignKey' => 'board_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'player_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('coins')
            ->requirePresence('coins', 'create')
            ->notEmpty('coins');

        $validator
            ->integer('opc')
            ->requirePresence('opc', 'create')
            ->notEmpty('opc');

        $validator
            ->integer('minus')
            ->requirePresence('minus', 'create')
            ->notEmpty('minus');

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
        $rules->add($rules->existsIn(['board_id'], 'Boards'));
        $rules->add($rules->existsIn(['player_id'], 'Users'));

        return $rules;
    }
}

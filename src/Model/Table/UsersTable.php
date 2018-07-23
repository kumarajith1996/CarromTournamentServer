<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsTo $Teams
 * @property \App\Model\Table\LevelsTable|\Cake\ORM\Association\BelongsTo $Levels
 * @property \App\Model\Table\BoardsTable|\Cake\ORM\Association\BelongsToMany $Boards
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id'
        ]);
        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id'
        ]);
        $this->belongsToMany('Boards', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'board_id',
            'joinTable' => 'boards_users'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('image_url')
            ->maxLength('image_url', 255)
            ->requirePresence('image_url', 'create')
            ->notEmpty('image_url');

        $validator
            ->scalar('role')
            ->maxLength('role', 100)
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->integer('base_points')
            ->requirePresence('base_points', 'create')
            ->notEmpty('base_points');

        $validator
            ->allowEmpty('past_team_ids');

        $validator
            ->integer('bid_value')
            ->allowEmpty('bid_value');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->boolean('isPlayer')
            ->requirePresence('isPlayer', 'create')
            ->notEmpty('isPlayer');

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
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        $rules->add($rules->existsIn(['level_id'], 'Levels'));

        return $rules;
    }
}

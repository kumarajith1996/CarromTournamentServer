<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matches Model
 *
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsTo $Teams
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsTo $Teams
 * @property \App\Model\Table\StagesTable|\Cake\ORM\Association\BelongsTo $Stages
 * @property \App\Model\Table\BoardsTable|\Cake\ORM\Association\HasMany $Boards
 *
 * @method \App\Model\Entity\Match get($primaryKey, $options = [])
 * @method \App\Model\Entity\Match newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Match[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Match|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Match[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Match findOrCreate($search, callable $callback = null, $options = [])
 */
class MatchesTable extends Table
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

        $this->setTable('matches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Teams', [
            'foreignKey' => 'team1_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Teams', [
            'foreignKey' => 'team2_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Stages', [
            'foreignKey' => 'stage_id'
        ]);
        $this->hasMany('Boards', [
            'foreignKey' => 'match_id'
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
            ->integer('winner')
            ->allowEmpty('winner');

        $validator
            ->integer('team1_points')
            ->allowEmpty('team1_points');

        $validator
            ->integer('team2_points')
            ->allowEmpty('team2_points');

        $validator
            ->integer('refree')
            ->allowEmpty('refree');

        $validator
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmpty('start_time');

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
        $rules->add($rules->existsIn(['team1_id'], 'Teams'));
        $rules->add($rules->existsIn(['team2_id'], 'Teams'));
        $rules->add($rules->existsIn(['stage_id'], 'Stages'));

        return $rules;
    }
}

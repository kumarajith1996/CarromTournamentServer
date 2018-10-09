<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;
/**
 * Biddings Model
 *
 * @property \App\Model\Table\TournamentsTable|\Cake\ORM\Association\BelongsTo $Tournaments
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Bidding get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bidding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bidding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bidding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bidding|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bidding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bidding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bidding findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BiddingsTable extends Table
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

        $this->setTable('biddings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tournaments', [
            'foreignKey' => 'tournament_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('bids');

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
        $rules->add($rules->existsIn(['tournament_id'], 'Tournaments'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function closeBid($requestData)
    {
        $bid = $this->get($requestData['id']);
        $bid->isBidClosed = true;
        $this->save($bid);
        $bid->bids = $this->getLargestBid($requestData['id']);
        //TODO: Assign player to team or go to secret bid
        return $bid;
   }

   public function getBidPlayer($requestData)
   {
        $result = [];
        $bids = $this->find()
            ->where(['id >=' =>  $requestData['id'] ?? 1])
            ->hydrate(false)
            ->toArray();
        
        //If required record is only the current record, wait for timestamp change or new records
        if(isset($requestData['modified']) && count($bids) == 1)
        {
            while(true)
            {
                $latestRecord = $this->find()->order(['id' => 'DESC'])->first();
                if($latestRecord->id == $requestData['id'])
                {
                    if($latestRecord->modified == new FrozenTime($requestData['modified']))
                    {  
                        sleep(1);
                    }
                    else
                    {
                        \Cake\Log\Log::debug($latestRecord);
                        $result[] = $latestRecord->toArray();
                        break;
                    }
                }
                else
                {
                    $result = $this->find()
                        ->where(['id >=' =>  $requestData['id']])
                        ->hydrate(false)
                        ->toArray();
                    break;
                }
            }
        }
        else
        {
            $result = $bids;
        }
        foreach ($result as &$bid) {
            $bid['bids'] = $this->getLargestBid($bid['id']);
        }
        return $result;
   }

   private function getLargestBid($id)
   {
        $maxBidValue = 0;
        $teamIds = [];
        $bids = $this->get($id)->bids;
        if($bids != null)
        {
            $maxBidValue = max($bids);
            $teamIds = array_keys($bids, $maxBidValue);
        }
        $largestBid = [];
        $largestBid['max_bid'] = $maxBidValue;
        $largestBid['teamIds'] = $teamIds;
        return $largestBid;
   }
}

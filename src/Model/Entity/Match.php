<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity
 *
 * @property int $id
 * @property int $team1_id
 * @property int $team2_id
 * @property int $stage_id
 * @property int $winner
 * @property int $team1_points
 * @property int $team2_points
 * @property int $refree
 * @property \Cake\I18n\FrozenTime $start_time
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Stage $stage
 * @property \App\Model\Entity\Board[] $boards
 */
class Match extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'team1_id' => true,
        'team2_id' => true,
        'stage_id' => true,
        'winner' => true,
        'team1_points' => true,
        'team2_points' => true,
        'refree' => true,
        'start_time' => true,
        'team' => true,
        'stage' => true,
        'boards' => true
    ];
}

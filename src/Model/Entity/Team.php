<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property int $tournament_id
 * @property string $name
 * @property int $bid_points
 * @property int $played
 * @property int $won
 * @property int $points
 * @property int $loss
 * @property int $league
 *
 * @property \App\Model\Entity\Tournament $tournament
 * @property \App\Model\Entity\User[] $users
 */
class Team extends Entity
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
        'tournament_id' => true,
        'name' => true,
        'bid_points' => true,
        'played' => true,
        'won' => true,
        'points' => true,
        'loss' => true,
        'league' => true,
        'tournament' => true,
        'users' => true
    ];
}

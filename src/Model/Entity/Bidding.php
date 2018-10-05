<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bidding Entity
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $user_id
 * @property array $bids
 * @property int $type
 * @property bool $isBidClosed
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Tournament $tournament
 * @property \App\Model\Entity\User $user
 */
class Bidding extends Entity
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
        'user_id' => true,
        'bids' => true,
        'type' => true,
        'isBidClosed' => true,
        'modified' => true,
        'tournament' => true,
        'user' => true
    ];
}

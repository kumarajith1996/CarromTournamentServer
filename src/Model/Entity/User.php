<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image_url
 * @property string $role
 * @property int $base_points
 * @property int $team_id
 * @property array $past_team_ids
 * @property int $bid_value
 * @property bool $status
 * @property int $level_id
 * @property bool $isPlayer
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Board[] $boards
 */
class User extends Entity
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
        'name' => true,
        'image_url' => true,
        'role' => true,
        'base_points' => true,
        'team_id' => true,
        'past_team_ids' => true,
        'bid_value' => true,
        'status' => true,
        'level_id' => true,
        'isPlayer' => true,
        'team' => true,
        'level' => true,
        'boards' => true
    ];
}

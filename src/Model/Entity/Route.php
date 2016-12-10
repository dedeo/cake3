<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Route Entity
 *
 * @property int $id
 * @property string $name
 * @property string $source
 * @property string $destination
 * @property int $distance
 * @property int $fare
 * @property \Cake\I18n\Time $create_at
 *
 * @property \App\Model\Entity\Schedule[] $schedules
 */
class Route extends Entity
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
        '*' => true,
        'id' => false
    ];
}

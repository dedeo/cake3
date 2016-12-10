<?php
namespace Dashboard\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bus Entity
 *
 * @property int $id
 * @property string $name
 * @property string $plat_no
 * @property string $facilities
 * @property int $capacity
 * @property string $status
 *
 * @property \Dashboard\Model\Entity\Schedule[] $schedules
 */
class Bus extends Entity
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

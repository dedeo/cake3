<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int $day
 * @property int $route_id
 * @property int $bus_id
 * @property \Cake\I18n\Time $departure_time
 * @property \Cake\I18n\Time $arival_time
 * @property \Cake\I18n\Time $create_at
 *
 * @property \App\Model\Entity\Route $route
 * @property \App\Model\Entity\Bus $bus
 */
class Schedule extends Entity
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

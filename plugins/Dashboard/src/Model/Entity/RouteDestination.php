<?php
namespace Dashboard\Model\Entity;

use Cake\ORM\Entity;

/**
 * RouteDestination Entity
 *
 * @property int $id
 * @property int $city
 * @property int $distance
 * @property int $fare
 * @property int $route_id
 * @property string $city_name
 *
 * @property \Dashboard\Model\Entity\Route $route
 */
class RouteDestination extends Entity
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

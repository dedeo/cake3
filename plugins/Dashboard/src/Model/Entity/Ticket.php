<?php
namespace Dashboard\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property int $schedule_id
 * @property \Cake\I18n\Time $create_at
 * @property \Cake\I18n\Time $departure_time
 * @property \Cake\I18n\Time $date
 * @property \Cake\I18n\Time $arival_time
 * @property string $fare
 * @property string $stock
 * @property int $bus_id
 * @property int $passegers
 *
 * @property \Dashboard\Model\Entity\Schedule $schedule
 * @property \Dashboard\Model\Entity\Bus $bus
 */
class Ticket extends Entity
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

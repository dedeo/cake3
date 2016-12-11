<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TicketOrder Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $schedule_id
 * @property int $seet_number
 * @property \Cake\I18n\Time $create_at
 * @property string $fare
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Schedule $schedule
 */
class TicketOrder extends Entity
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

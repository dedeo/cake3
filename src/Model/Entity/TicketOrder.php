<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TicketOrder Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $ticket_id
 * @property string $ticket_code
 * @property \Cake\I18n\Time $create_at
 * @property \Cake\I18n\Time $departure_time
 * @property \Cake\I18n\Time $departure_date
 * @property \Cake\I18n\Time $arival_time
 * @property \Cake\I18n\Time $arival_date
 * @property string $fare
 * @property int $passegers
 * @property string $total
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Ticket $ticket
 * @property \App\Model\Entity\TicketPassenger[] $ticket_passengers
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

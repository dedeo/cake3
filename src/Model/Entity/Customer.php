<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $no_tlp
 * @property string $address
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Avatar $avatar
 * @property \App\Model\Entity\TicketOrder[] $ticket_orders
 */
class Customer extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

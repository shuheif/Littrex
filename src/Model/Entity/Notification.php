<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $type
 * @property int $variable1
 * @property int $variable2
 * @property \Cake\I18n\Time $date
 * @property int $sender_id
 * @property int $id
 *
 * @property \App\Model\Entity\Sender $sender
 * @property \App\Model\Entity\Message[] $messages
 */
class Notification extends Entity
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

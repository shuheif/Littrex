<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Submission Entity
 *
 * @property int $id
 * @property int $assignment_id
 * @property int $user_id
 * @property int $grade_id
 * @property \Cake\I18n\Time $submit_date
 * @property int $attachment_id
 *
 * @property \App\Model\Entity\Assignment $assignment
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Grade $grade
 * @property \App\Model\Entity\Attachment $attachment
 */
class Submission extends Entity
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

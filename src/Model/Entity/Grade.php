<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grade Entity
 *
 * @property int $id
 * @property int $grade
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\Time $date
 *
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\CoursesGradesUser[] $courses_grades_users
 * @property \App\Model\Entity\CoursesUser[] $courses_users
 */
class Grade extends Entity
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

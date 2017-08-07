<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property string $title
 * @property string $department
 * @property int $number
 * @property string $syllabus
 * @property int $teacher_id
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\Attendance[] $attendances
 * @property \App\Model\Entity\Cell[] $cells
 * @property \App\Model\Entity\CoursesGradesUser[] $courses_grades_users
 */
class Course extends Entity
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

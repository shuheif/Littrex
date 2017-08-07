<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property int $role
 * @property \Cake\I18n\Time $created_date
 * @property int $image_id
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Assignment[] $assignments
 * @property \App\Model\Entity\Attendance[] $attendances
 * @property \App\Model\Entity\CoursesGradesUser[] $courses_grades_users
 * @property \App\Model\Entity\Information[] $informations
 * @property \App\Model\Entity\Club[] $clubs
 * @property \App\Model\Entity\Course[] $courses
 */
class User extends Entity
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

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}

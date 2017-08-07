<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubmissionsFixture
 *
 */
class SubmissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'assignment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'grade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'submit_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'attachment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'assignment_key' => ['type' => 'index', 'columns' => ['assignment_id'], 'length' => []],
            'user_key' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'grade_key' => ['type' => 'index', 'columns' => ['grade_id'], 'length' => []],
            'attachment_key' => ['type' => 'index', 'columns' => ['attachment_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'submissions_ibfk_1' => ['type' => 'foreign', 'columns' => ['assignment_id'], 'references' => ['assignments', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'submissions_ibfk_2' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'submissions_ibfk_3' => ['type' => 'foreign', 'columns' => ['grade_id'], 'references' => ['grades', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'submissions_ibfk_4' => ['type' => 'foreign', 'columns' => ['attachment_id'], 'references' => ['attachments', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'assignment_id' => 1,
            'user_id' => 1,
            'grade_id' => 1,
            'submit_date' => '2017-08-06 01:42:44',
            'attachment_id' => 1
        ],
    ];
}

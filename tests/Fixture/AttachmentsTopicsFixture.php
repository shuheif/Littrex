<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttachmentsTopicsFixture
 *
 */
class AttachmentsTopicsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'topic_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'attachment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'topic_key' => ['type' => 'index', 'columns' => ['topic_id'], 'length' => []],
            'attachment_key' => ['type' => 'index', 'columns' => ['attachment_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'attachments_topics_ibfk_1' => ['type' => 'foreign', 'columns' => ['topic_id'], 'references' => ['topics', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'attachments_topics_ibfk_2' => ['type' => 'foreign', 'columns' => ['attachment_id'], 'references' => ['attachments', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'topic_id' => 1,
            'attachment_id' => 1
        ],
    ];
}

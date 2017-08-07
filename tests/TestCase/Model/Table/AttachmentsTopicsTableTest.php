<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttachmentsTopicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttachmentsTopicsTable Test Case
 */
class AttachmentsTopicsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttachmentsTopicsTable
     */
    public $AttachmentsTopics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attachments_topics',
        'app.topics',
        'app.courses',
        'app.users',
        'app.images',
        'app.clubs',
        'app.clubs_users',
        'app.assignments',
        'app.grades',
        'app.courses_grades_users',
        'app.courses_users',
        'app.attachments',
        'app.attachments_cells',
        'app.attendances',
        'app.informations',
        'app.assignments_topics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AttachmentsTopics') ? [] : ['className' => 'App\Model\Table\AttachmentsTopicsTable'];
        $this->AttachmentsTopics = TableRegistry::get('AttachmentsTopics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AttachmentsTopics);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

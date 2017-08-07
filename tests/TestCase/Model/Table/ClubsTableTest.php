<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClubsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClubsTable Test Case
 */
class ClubsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClubsTable
     */
    public $Clubs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clubs',
        'app.images',
        'app.users',
        'app.assignments',
        'app.attendances',
        'app.courses_grades_users',
        'app.informations',
        'app.clubs_users',
        'app.courses',
        'app.courses_users',
        'app.cells'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Clubs') ? [] : ['className' => 'App\Model\Table\ClubsTable'];
        $this->Clubs = TableRegistry::get('Clubs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clubs);

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

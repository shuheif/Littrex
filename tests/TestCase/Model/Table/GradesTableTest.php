<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GradesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GradesTable Test Case
 */
class GradesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GradesTable
     */
    public $Grades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grades',
        'app.assignments',
        'app.attachments',
        'app.users',
        'app.images',
        'app.clubs',
        'app.clubs_users',
        'app.attendances',
        'app.courses',
        'app.courses_users',
        'app.cells',
        'app.attachments_cells',
        'app.courses_grades_users',
        'app.informations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Grades') ? [] : ['className' => 'App\Model\Table\GradesTable'];
        $this->Grades = TableRegistry::get('Grades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grades);

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
}

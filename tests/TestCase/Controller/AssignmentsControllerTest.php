<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AssignmentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AssignmentsController Test Case
 */
class AssignmentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assignments',
        'app.grades',
        'app.attachments',
        'app.users',
        'app.images',
        'app.attendances',
        'app.courses',
        'app.courses_users',
        'app.cells',
        'app.courses_grades_users',
        'app.informations',
        'app.clubs',
        'app.clubs_users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

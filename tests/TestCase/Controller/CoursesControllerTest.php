<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CoursesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CoursesController Test Case
 */
class CoursesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.courses',
        'app.users',
        'app.images',
        'app.assignments',
        'app.attendances',
        'app.courses_grades_users',
        'app.informations',
        'app.clubs',
        'app.clubs_users',
        'app.courses_users',
        'app.cells'
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

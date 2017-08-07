<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SubmissionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SubmissionsController Test Case
 */
class SubmissionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.submissions',
        'app.assignments',
        'app.courses',
        'app.users',
        'app.images',
        'app.clubs',
        'app.clubs_users',
        'app.attendances',
        'app.courses_users',
        'app.informations',
        'app.topics',
        'app.assignments_topics',
        'app.attachments',
        'app.attachments_topics',
        'app.attachments_cells',
        'app.grades',
        'app.courses_grades_users'
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

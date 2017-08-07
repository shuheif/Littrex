<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TopicsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TopicsController Test Case
 */
class TopicsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.cells',
        'app.attachments_cells',
        'app.attachments_topics',
        'app.assignments_topics',
        'app.attendances',
        'app.informations'
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

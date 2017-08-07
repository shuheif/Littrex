<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagesTable Test Case
 */
class ImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagesTable
     */
    public $Images;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.images',
        'app.clubs',
        'app.users',
        'app.assignments',
        'app.grades',
        'app.attachments',
        'app.courses',
        'app.courses_users',
        'app.attendances',
        'app.cells',
        'app.attachments_cells',
        'app.courses_grades_users',
        'app.informations',
        'app.clubs_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Images') ? [] : ['className' => 'App\Model\Table\ImagesTable'];
        $this->Images = TableRegistry::get('Images', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Images);

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

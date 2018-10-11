<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempPostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempPostsTable Test Case
 */
class TempPostsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempPostsTable
     */
    public $TempPosts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TempPosts') ? [] : ['className' => TempPostsTable::class];
        $this->TempPosts = TableRegistry::getTableLocator()->get('TempPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempPosts);

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

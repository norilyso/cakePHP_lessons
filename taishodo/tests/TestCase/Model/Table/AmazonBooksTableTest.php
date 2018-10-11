<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AmazonBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AmazonBooksTable Test Case
 */
class AmazonBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AmazonBooksTable
     */
    public $AmazonBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.amazon_books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AmazonBooks') ? [] : ['className' => AmazonBooksTable::class];
        $this->AmazonBooks = TableRegistry::getTableLocator()->get('AmazonBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AmazonBooks);

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

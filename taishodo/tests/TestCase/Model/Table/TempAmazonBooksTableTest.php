<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempAmazonBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempAmazonBooksTable Test Case
 */
class TempAmazonBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempAmazonBooksTable
     */
    public $TempAmazonBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_amazon_books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TempAmazonBooks') ? [] : ['className' => TempAmazonBooksTable::class];
        $this->TempAmazonBooks = TableRegistry::getTableLocator()->get('TempAmazonBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempAmazonBooks);

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

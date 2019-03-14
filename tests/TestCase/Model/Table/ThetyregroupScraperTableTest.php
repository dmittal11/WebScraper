<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThetyregroupScraperTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThetyregroupScraperTable Test Case
 */
class ThetyregroupScraperTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThetyregroupScraperTable
     */
    public $ThetyregroupScraper;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ThetyregroupScraper'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ThetyregroupScraper') ? [] : ['className' => ThetyregroupScraperTable::class];
        $this->ThetyregroupScraper = TableRegistry::getTableLocator()->get('ThetyregroupScraper', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThetyregroupScraper);

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

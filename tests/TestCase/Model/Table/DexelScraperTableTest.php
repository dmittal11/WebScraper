<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DexelScraperTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DexelScraperTable Test Case
 */
class DexelScraperTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DexelScraperTable
     */
    public $DexelScraper;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DexelScraper'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DexelScraper') ? [] : ['className' => DexelScraperTable::class];
        $this->DexelScraper = TableRegistry::getTableLocator()->get('DexelScraper', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DexelScraper);

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

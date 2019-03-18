<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebsiteScraperTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebsiteScraperTable Test Case
 */
class WebsiteScraperTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WebsiteScraperTable
     */
    public $WebsiteScraper;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WebsiteScraper',
        'app.TyreDetails',
        'app.WebsiteDetails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WebsiteScraper') ? [] : ['className' => WebsiteScraperTable::class];
        $this->WebsiteScraper = TableRegistry::getTableLocator()->get('WebsiteScraper', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WebsiteScraper);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

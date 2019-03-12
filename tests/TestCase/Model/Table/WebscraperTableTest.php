<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebscraperTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebscraperTable Test Case
 */
class WebscraperTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WebscraperTable
     */
    public $Webscraper;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Webscraper'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Webscraper') ? [] : ['className' => WebscraperTable::class];
        $this->Webscraper = TableRegistry::getTableLocator()->get('Webscraper', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Webscraper);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebsiteDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebsiteDetailsTable Test Case
 */
class WebsiteDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WebsiteDetailsTable
     */
    public $WebsiteDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WebsiteDetails',
        'app.WebsiteScraper'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WebsiteDetails') ? [] : ['className' => WebsiteDetailsTable::class];
        $this->WebsiteDetails = TableRegistry::getTableLocator()->get('WebsiteDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WebsiteDetails);

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

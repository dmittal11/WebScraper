<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TyreDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TyreDetailsTable Test Case
 */
class TyreDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TyreDetailsTable
     */
    public $TyreDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TyreDetails',
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
        $config = TableRegistry::getTableLocator()->exists('TyreDetails') ? [] : ['className' => TyreDetailsTable::class];
        $this->TyreDetails = TableRegistry::getTableLocator()->get('TyreDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TyreDetails);

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

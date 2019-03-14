<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DexelScraperFixture
 *
 */
class DexelScraperFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'dexel_scraper';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Brand_name' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Pattern_name' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Tyre_size' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Price' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Url' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Scrape_data' => ['type' => 'string', 'length' => 10000, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'Brand_name' => 'Lorem ipsum dolor sit amet',
                'Pattern_name' => 'Lorem ipsum dolor sit amet',
                'Tyre_size' => 'Lorem ipsum dolor sit amet',
                'Price' => 'Lorem ipsum dolor sit amet',
                'Url' => 'Lorem ipsum dolor sit amet',
                'Scrape_data' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}

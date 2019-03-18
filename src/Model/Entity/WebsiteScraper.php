<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebsiteScraper Entity
 *
 * @property int $id
 * @property string $Brand_name
 * @property string $Pattern_name
 * @property string $Tyre_size
 * @property string $Price
 * @property string $Url
 * @property string $Scrape_date
 * @property int $tyre_detail_id
 * @property int $website_detail_id
 *
 * @property \App\Model\Entity\TyreDetail $tyre_detail
 * @property \App\Model\Entity\WebsiteDetail $website_detail
 */
class WebsiteScraper extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'Brand_name' => true,
        'Pattern_name' => true,
        'Tyre_size' => true,
        'Price' => true,
        'Url' => true,
        'Scrape_date' => true,
        'tyre_detail_id' => true,
        'website_detail_id' => true,
        'tyre_detail' => true,
        'website_detail' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebsiteDetail Entity
 *
 * @property int $id
 * @property string $Url
 *
 * @property \App\Model\Entity\WebsiteScraper[] $website_scraper
 */
class WebsiteDetail extends Entity
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
        'Url' => true,
        'website_scraper' => true
    ];
}

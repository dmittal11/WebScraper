<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteScraper $websiteScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Website Scraper'), ['action' => 'edit', $websiteScraper->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Website Scraper'), ['action' => 'delete', $websiteScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websiteScraper->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tyre Details'), ['controller' => 'TyreDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tyre Detail'), ['controller' => 'TyreDetails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Website Details'), ['controller' => 'WebsiteDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Website Detail'), ['controller' => 'WebsiteDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="websiteScraper view large-9 medium-8 columns content">
    <h3><?= h($websiteScraper->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($websiteScraper->Brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pattern Name') ?></th>
            <td><?= h($websiteScraper->Pattern_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tyre Size') ?></th>
            <td><?= h($websiteScraper->Tyre_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($websiteScraper->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($websiteScraper->Url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scrape Date') ?></th>
            <td><?= h($websiteScraper->Scrape_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tyre Detail') ?></th>
            <td><?= $websiteScraper->has('tyre_detail') ? $this->Html->link($websiteScraper->tyre_detail->id, ['controller' => 'TyreDetails', 'action' => 'view', $websiteScraper->tyre_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Website Detail') ?></th>
            <td><?= $websiteScraper->has('website_detail') ? $this->Html->link($websiteScraper->website_detail->id, ['controller' => 'WebsiteDetails', 'action' => 'view', $websiteScraper->website_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($websiteScraper->id) ?></td>
        </tr>
    </table>
</div>

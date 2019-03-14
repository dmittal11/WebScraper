<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DexelScraper $dexelScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dexel Scraper'), ['action' => 'edit', $dexelScraper->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dexel Scraper'), ['action' => 'delete', $dexelScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dexelScraper->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dexel Scraper'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dexel Scraper'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dexelScraper view large-9 medium-8 columns content">
    <h3><?= h($dexelScraper->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($dexelScraper->Brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pattern Name') ?></th>
            <td><?= h($dexelScraper->Pattern_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tyre Size') ?></th>
            <td><?= h($dexelScraper->Tyre_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($dexelScraper->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($dexelScraper->Url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scrape Data') ?></th>
            <td><?= h($dexelScraper->Scrape_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dexelScraper->id) ?></td>
        </tr>
    </table>
</div>

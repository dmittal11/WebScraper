<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThetyregroupScraper $thetyregroupScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Thetyregroup Scraper'), ['action' => 'edit', $thetyregroupScraper->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Thetyregroup Scraper'), ['action' => 'delete', $thetyregroupScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thetyregroupScraper->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Thetyregroup Scraper'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Thetyregroup Scraper'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="thetyregroupScraper view large-9 medium-8 columns content">
    <h3><?= h($thetyregroupScraper->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($thetyregroupScraper->Brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pattern Name') ?></th>
            <td><?= h($thetyregroupScraper->Pattern_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tyre Size') ?></th>
            <td><?= h($thetyregroupScraper->Tyre_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($thetyregroupScraper->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($thetyregroupScraper->Url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scrape Data') ?></th>
            <td><?= h($thetyregroupScraper->Scrape_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($thetyregroupScraper->id) ?></td>
        </tr>
    </table>
</div>

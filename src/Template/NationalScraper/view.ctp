<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NationalScraper $nationalScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit National Scraper'), ['action' => 'edit', $nationalScraper->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete National Scraper'), ['action' => 'delete', $nationalScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalScraper->id)]) ?> </li>
        <li><?= $this->Html->link(__('List National Scraper'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New National Scraper'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nationalScraper view large-9 medium-8 columns content">
    <h3><?= h($nationalScraper->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($nationalScraper->Brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pattern Name') ?></th>
            <td><?= h($nationalScraper->Pattern_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tyre Size') ?></th>
            <td><?= h($nationalScraper->Tyre_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($nationalScraper->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($nationalScraper->Url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scrape Data') ?></th>
            <td><?= h($nationalScraper->Scrape_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nationalScraper->id) ?></td>
        </tr>
    </table>
</div>

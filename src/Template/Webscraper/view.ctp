<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Webscraper $webscraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Webscraper'), ['action' => 'edit', $webscraper->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Webscraper'), ['action' => 'delete', $webscraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $webscraper->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Webscraper'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Webscraper'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="webscraper view large-9 medium-8 columns content">
    <h3><?= h($webscraper->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($webscraper->brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pattern Name') ?></th>
            <td><?= h($webscraper->pattern_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tyre Size') ?></th>
            <td><?= h($webscraper->tyre_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($webscraper->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($webscraper->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scrape Data') ?></th>
            <td><?= h($webscraper->scrape_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($webscraper->id) ?></td>
        </tr>
    </table>
</div>

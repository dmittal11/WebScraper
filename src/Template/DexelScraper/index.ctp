<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DexelScraper[]|\Cake\Collection\CollectionInterface $dexelScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dexel Scraper'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dexelScraper index large-9 medium-8 columns content">
    <h3><?= __('Dexel Scraper') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Brand_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pattern_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tyre_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Scrape_data') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dexelScraper as $dexelScraper): ?>
            <tr>
                <td><?= $this->Number->format($dexelScraper->id) ?></td>
                <td><?= h($dexelScraper->Brand_name) ?></td>
                <td><?= h($dexelScraper->Pattern_name) ?></td>
                <td><?= h($dexelScraper->Tyre_size) ?></td>
                <td><?= h($dexelScraper->Price) ?></td>
                <td><?= h($dexelScraper->Url) ?></td>
                <td><?= h($dexelScraper->Scrape_data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dexelScraper->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dexelScraper->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dexelScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dexelScraper->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

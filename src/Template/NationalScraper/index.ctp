<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NationalScraper[]|\Cake\Collection\CollectionInterface $nationalScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New National Scraper'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nationalScraper index large-9 medium-8 columns content">
    <h3><?= __('National Scraper') ?></h3>
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
            <?php foreach ($nationalScraper as $nationalScraper): ?>
            <tr>
                <td><?= $this->Number->format($nationalScraper->id) ?></td>
                <td><?= h($nationalScraper->Brand_name) ?></td>
                <td><?= h($nationalScraper->Pattern_name) ?></td>
                <td><?= h($nationalScraper->Tyre_size) ?></td>
                <td><?= h($nationalScraper->Price) ?></td>
                <td><?= h($nationalScraper->Url) ?></td>
                <td><?= h($nationalScraper->Scrape_data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nationalScraper->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nationalScraper->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nationalScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalScraper->id)]) ?>
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

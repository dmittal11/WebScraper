<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThetyregroupScraper[]|\Cake\Collection\CollectionInterface $thetyregroupScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Thetyregroup Scraper'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="thetyregroupScraper index large-9 medium-8 columns content">
    <h3><?= __('Thetyregroup Scraper') ?></h3>
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
            <?php foreach ($thetyregroupScraper as $thetyregroupScraper): ?>
            <tr>
                <td><?= $this->Number->format($thetyregroupScraper->id) ?></td>
                <td><?= h($thetyregroupScraper->Brand_name) ?></td>
                <td><?= h($thetyregroupScraper->Pattern_name) ?></td>
                <td><?= h($thetyregroupScraper->Tyre_size) ?></td>
                <td><?= h($thetyregroupScraper->Price) ?></td>
                <td><?= h($thetyregroupScraper->Url) ?></td>
                <td><?= h($thetyregroupScraper->Scrape_data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $thetyregroupScraper->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $thetyregroupScraper->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $thetyregroupScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thetyregroupScraper->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteScraper[]|\Cake\Collection\CollectionInterface $websiteScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tyre Details'), ['controller' => 'TyreDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tyre Detail'), ['controller' => 'TyreDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Website Details'), ['controller' => 'WebsiteDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Website Detail'), ['controller' => 'WebsiteDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="websiteScraper index large-9 medium-8 columns content">
    <h3><?= __('Website Scraper') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Brand_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pattern_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Tyre_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Scrape_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tyre_detail_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('website_detail_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($websiteScraper as $websiteScraper): ?>
            <tr>
                <td><?= $this->Number->format($websiteScraper->id) ?></td>
                <td><?= h($websiteScraper->Brand_name) ?></td>
                <td><?= h($websiteScraper->Pattern_name) ?></td>
                <td><?= h($websiteScraper->Tyre_size) ?></td>
                <td><?= h($websiteScraper->Price) ?></td>
                <td><?= h($websiteScraper->Url) ?></td>
                <td><?= h($websiteScraper->Scrape_date) ?></td>
                <td><?= $websiteScraper->has('tyre_detail') ? $this->Html->link($websiteScraper->tyre_detail->id, ['controller' => 'TyreDetails', 'action' => 'view', $websiteScraper->tyre_detail->id]) : '' ?></td>
                <td><?= $websiteScraper->has('website_detail') ? $this->Html->link($websiteScraper->website_detail->id, ['controller' => 'WebsiteDetails', 'action' => 'view', $websiteScraper->website_detail->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $websiteScraper->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $websiteScraper->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $websiteScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websiteScraper->id)]) ?>
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

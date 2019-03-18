<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteDetail[]|\Cake\Collection\CollectionInterface $websiteDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Website Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="websiteDetails index large-9 medium-8 columns content">
    <h3><?= __('Website Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($websiteDetails as $websiteDetail): ?>
            <tr>
                <td><?= $this->Number->format($websiteDetail->id) ?></td>
                <td><?= h($websiteDetail->Url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $websiteDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $websiteDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $websiteDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websiteDetail->id)]) ?>
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

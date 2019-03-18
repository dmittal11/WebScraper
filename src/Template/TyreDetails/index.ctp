<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TyreDetail[]|\Cake\Collection\CollectionInterface $tyreDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tyre Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tyreDetails index large-9 medium-8 columns content">
    <h3><?= __('Tyre Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aspect_ratio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rim') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tyreDetails as $tyreDetail): ?>
            <tr>
                <td><?= $this->Number->format($tyreDetail->id) ?></td>
                <td><?= h($tyreDetail->width) ?></td>
                <td><?= h($tyreDetail->aspect_ratio) ?></td>
                <td><?= h($tyreDetail->rim) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tyreDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tyreDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tyreDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tyreDetail->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteDetail $websiteDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Website Detail'), ['action' => 'edit', $websiteDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Website Detail'), ['action' => 'delete', $websiteDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websiteDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Website Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Website Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="websiteDetails view large-9 medium-8 columns content">
    <h3><?= h($websiteDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($websiteDetail->Url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($websiteDetail->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Website Scraper') ?></h4>
        <?php if (!empty($websiteDetail->website_scraper)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Brand Name') ?></th>
                <th scope="col"><?= __('Pattern Name') ?></th>
                <th scope="col"><?= __('Tyre Size') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Scrape Date') ?></th>
                <th scope="col"><?= __('Tyre Detail Id') ?></th>
                <th scope="col"><?= __('Website Detail Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($websiteDetail->website_scraper as $websiteScraper): ?>
            <tr>
                <td><?= h($websiteScraper->id) ?></td>
                <td><?= h($websiteScraper->Brand_name) ?></td>
                <td><?= h($websiteScraper->Pattern_name) ?></td>
                <td><?= h($websiteScraper->Tyre_size) ?></td>
                <td><?= h($websiteScraper->Price) ?></td>
                <td><?= h($websiteScraper->Url) ?></td>
                <td><?= h($websiteScraper->Scrape_date) ?></td>
                <td><?= h($websiteScraper->tyre_detail_id) ?></td>
                <td><?= h($websiteScraper->website_detail_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WebsiteScraper', 'action' => 'view', $websiteScraper->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WebsiteScraper', 'action' => 'edit', $websiteScraper->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WebsiteScraper', 'action' => 'delete', $websiteScraper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websiteScraper->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

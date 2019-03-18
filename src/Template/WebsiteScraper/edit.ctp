<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteScraper $websiteScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $websiteScraper->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $websiteScraper->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tyre Details'), ['controller' => 'TyreDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tyre Detail'), ['controller' => 'TyreDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Website Details'), ['controller' => 'WebsiteDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Website Detail'), ['controller' => 'WebsiteDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="websiteScraper form large-9 medium-8 columns content">
    <?= $this->Form->create($websiteScraper) ?>
    <fieldset>
        <legend><?= __('Edit Website Scraper') ?></legend>
        <?php
            echo $this->Form->control('Brand_name');
            echo $this->Form->control('Pattern_name');
            echo $this->Form->control('Tyre_size');
            echo $this->Form->control('Price');
            echo $this->Form->control('Url');
            echo $this->Form->control('Scrape_date');
            echo $this->Form->control('tyre_detail_id', ['options' => $tyreDetails]);
            echo $this->Form->control('website_detail_id', ['options' => $websiteDetails]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

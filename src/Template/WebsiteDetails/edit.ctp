<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteDetail $websiteDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $websiteDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $websiteDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Website Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="websiteDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($websiteDetail) ?>
    <fieldset>
        <legend><?= __('Edit Website Detail') ?></legend>
        <?php
            echo $this->Form->control('Url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

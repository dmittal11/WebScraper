<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TyreDetail $tyreDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tyre Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Website Scraper'), ['controller' => 'WebsiteScraper', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tyreDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($tyreDetail) ?>
    <fieldset>
        <legend><?= __('Add Tyre Detail') ?></legend>
        <?php
            echo $this->Form->control('width');
            echo $this->Form->control('aspect_ratio');
            echo $this->Form->control('rim');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

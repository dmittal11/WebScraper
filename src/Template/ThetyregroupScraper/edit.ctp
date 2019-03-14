<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThetyregroupScraper $thetyregroupScraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $thetyregroupScraper->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $thetyregroupScraper->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Thetyregroup Scraper'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="thetyregroupScraper form large-9 medium-8 columns content">
    <?= $this->Form->create($thetyregroupScraper) ?>
    <fieldset>
        <legend><?= __('Edit Thetyregroup Scraper') ?></legend>
        <?php
            echo $this->Form->control('Brand_name');
            echo $this->Form->control('Pattern_name');
            echo $this->Form->control('Tyre_size');
            echo $this->Form->control('Price');
            echo $this->Form->control('Url');
            echo $this->Form->control('Scrape_data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

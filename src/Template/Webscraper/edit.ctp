<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Webscraper $webscraper
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $webscraper->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $webscraper->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Webscraper'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="webscraper form large-9 medium-8 columns content">
    <?= $this->Form->create($webscraper) ?>
    <fieldset>
        <legend><?= __('Edit Webscraper') ?></legend>
        <?php
            echo $this->Form->control('brand_name');
            echo $this->Form->control('pattern_name');
            echo $this->Form->control('tyre_size');
            echo $this->Form->control('price');
            echo $this->Form->control('url');
            echo $this->Form->control('scrape_data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

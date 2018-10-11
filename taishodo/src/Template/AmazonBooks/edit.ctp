<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AmazonBook $amazonBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $amazonBook->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $amazonBook->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Amazon Books'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="amazonBooks form large-9 medium-8 columns content">
    <?= $this->Form->create($amazonBook) ?>
    <fieldset>
        <legend><?= __('Edit Amazon Book') ?></legend>
        <?php
            echo $this->Form->control('item_name');
            echo $this->Form->control('item_ID');
            echo $this->Form->control('SKU');
            echo $this->Form->control('price');
            echo $this->Form->control('quantity');
            echo $this->Form->control('list_day', ['empty' => true]);
            echo $this->Form->control('item_id_tipe');
            echo $this->Form->control('description');
            echo $this->Form->control('condition_type');
            echo $this->Form->control('foreign_ship_flg');
            echo $this->Form->control('rapid_ship_flg');
            echo $this->Form->control('isbn_asin');
            echo $this->Form->control('stocks');
            echo $this->Form->control('fulfillment_channel');
            echo $this->Form->control('merchant_shipping_group');
            echo $this->Form->control('point');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

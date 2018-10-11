<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AmazonBook $amazonBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Amazon Book'), ['action' => 'edit', $amazonBook->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Amazon Book'), ['action' => 'delete', $amazonBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amazonBook->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Amazon Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amazon Book'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="amazonBooks view large-9 medium-8 columns content">
    <h3><?= h($amazonBook->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item Name') ?></th>
            <td><?= h($amazonBook->item_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item ID') ?></th>
            <td><?= h($amazonBook->item_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SKU') ?></th>
            <td><?= h($amazonBook->SKU) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($amazonBook->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foreign Ship Flg') ?></th>
            <td><?= h($amazonBook->foreign_ship_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rapid Ship Flg') ?></th>
            <td><?= h($amazonBook->rapid_ship_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn Asin') ?></th>
            <td><?= h($amazonBook->isbn_asin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fulfillment Channel') ?></th>
            <td><?= h($amazonBook->fulfillment_channel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant Shipping Group') ?></th>
            <td><?= h($amazonBook->merchant_shipping_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($amazonBook->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($amazonBook->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($amazonBook->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Id Tipe') ?></th>
            <td><?= $this->Number->format($amazonBook->item_id_tipe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition Type') ?></th>
            <td><?= $this->Number->format($amazonBook->condition_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stocks') ?></th>
            <td><?= $this->Number->format($amazonBook->stocks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $this->Number->format($amazonBook->point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('List Day') ?></th>
            <td><?= h($amazonBook->list_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($amazonBook->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($amazonBook->modified) ?></td>
        </tr>
    </table>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TempAmazonBook $tempAmazonBook
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Temp Amazon Book'), ['action' => 'edit', $tempAmazonBook->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Temp Amazon Book'), ['action' => 'delete', $tempAmazonBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempAmazonBook->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Temp Amazon Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Temp Amazon Book'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tempAmazonBooks view large-9 medium-8 columns content">
    <h3><?= h($tempAmazonBook->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item Name') ?></th>
            <td><?= h($tempAmazonBook->item_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item ID') ?></th>
            <td><?= h($tempAmazonBook->item_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SKU') ?></th>
            <td><?= h($tempAmazonBook->SKU) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($tempAmazonBook->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foreign Ship Flg') ?></th>
            <td><?= h($tempAmazonBook->foreign_ship_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rapid Ship Flg') ?></th>
            <td><?= h($tempAmazonBook->rapid_ship_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn Asin') ?></th>
            <td><?= h($tempAmazonBook->isbn_asin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fulfillment Channel') ?></th>
            <td><?= h($tempAmazonBook->fulfillment_channel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant Shipping Group') ?></th>
            <td><?= h($tempAmazonBook->merchant_shipping_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Id Tipe') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->item_id_tipe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition Type') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->condition_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stocks') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->stocks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $this->Number->format($tempAmazonBook->point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('List Day') ?></th>
            <td><?= h($tempAmazonBook->list_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tempAmazonBook->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tempAmazonBook->modified) ?></td>
        </tr>
    </table>
</div>

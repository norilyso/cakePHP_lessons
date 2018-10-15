<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TempAmazonBook[]|\Cake\Collection\CollectionInterface $tempAmazonBooks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Temp Amazon Book'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tempAmazonBooks index large-9 medium-8 columns content">
    <h3><?= __('Temp Amazon Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SKU') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('list_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id_tipe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('condition_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foreign_ship_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rapid_ship_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn_asin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stocks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fulfillment_channel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_shipping_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('point') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tempAmazonBooks as $tempAmazonBook): ?>
            <tr>
                <td><?= $this->Number->format($tempAmazonBook->id) ?></td>
                <td><?= h($tempAmazonBook->item_name) ?></td>
                <td><?= h($tempAmazonBook->item_ID) ?></td>
                <td><?= h($tempAmazonBook->SKU) ?></td>
                <td><?= $this->Number->format($tempAmazonBook->price) ?></td>
                <td><?= $this->Number->format($tempAmazonBook->quantity) ?></td>
                <td><?= h($tempAmazonBook->list_day) ?></td>
                <td><?= $this->Number->format($tempAmazonBook->item_id_tipe) ?></td>
                <td><?= h($tempAmazonBook->description) ?></td>
                <td><?= $this->Number->format($tempAmazonBook->condition_type) ?></td>
                <td><?= h($tempAmazonBook->foreign_ship_flg) ?></td>
                <td><?= h($tempAmazonBook->rapid_ship_flg) ?></td>
                <td><?= h($tempAmazonBook->isbn_asin) ?></td>
                <td><?= $this->Number->format($tempAmazonBook->stocks) ?></td>
                <td><?= h($tempAmazonBook->fulfillment_channel) ?></td>
                <td><?= h($tempAmazonBook->merchant_shipping_group) ?></td>
                <td><?= $this->Number->format($tempAmazonBook->point) ?></td>
                <td><?= h($tempAmazonBook->created) ?></td>
                <td><?= h($tempAmazonBook->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tempAmazonBook->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tempAmazonBook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tempAmazonBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempAmazonBook->id)]) ?>
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

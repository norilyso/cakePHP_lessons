<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AmazonBook[]|\Cake\Collection\CollectionInterface $amazonBooks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li>
        <?= $this->Form->create(
                            "null", [ "type" => "get",
                            "url" => [ "action" => "index" ] ] ); ?>
        <fieldset>
        <legend><?= __('検索') ?></legend>

        <?php
            echo $this ->Form->control( "q_keyword", 
                                        [ "size" => 20,
                                        "label" => "キーワード",
                                        'value' => $this->request->query('q_keyword')
                                          ] );
            
            echo $this ->Form->control( "q_container", 
                                          [ "size" => 5,
                                          "label" => "倉庫",
                                          'value' => $this->request->query('q_container')
                                            ] );
            echo $this ->Form->control( "q_shelf", 
                                            [ "size" => 5,
                                            "label" => "棚",
                                            'value' => $this->request->query('q_shelf')
                                              ] );
    
        
            echo $this->Form->button(__('検索')); 
            echo $this->Form->end();
        ?>
        
        </li>
    </ul>
</nav>
<div class="amazonBooks index large-9 medium-8 columns content">
    <h3><?= __('Amazon Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('SKU') ?>
                <th scope="col"><?= $this->Paginator->sort('item_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn_asin') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('item_ID') ?></th> </th> -->
                
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>

                <th scope="col"><?= $this->Paginator->sort('list_day') ?></th>
            <!--    <th scope="col"><?= $this->Paginator->sort('item_id_tipe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th> -->

            <!--    <th scope="col"><?= $this->Paginator->sort('condition_type') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('foreign_ship_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rapid_ship_flg') ?></th> -->
                
                <!-- <th scope="col"><?= $this->Paginator->sort('stocks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fulfillment_channel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_shipping_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('point') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amazonBooks as $amazonBook): ?>
            <tr>
                <!-- <td><?= $this->Number->format($amazonBook->id) ?></td> -->
                <td><?= h($amazonBook->SKU) ?></td> 
                <td><?= h($amazonBook->item_name) ?></td>
                <!-- <td><?= h($amazonBook->item_ID) ?></td> -->
                <td><?= h($amazonBook->isbn_asin) ?></td> 
                <td><?= $this->Number->format($amazonBook->price) ?></td>
                <td><?= $this->Number->format($amazonBook->quantity) ?></td>
                <td><?= h($amazonBook->list_day) ?></td>
                <!--<td><?= $this->Number->format($amazonBook->item_id_tipe) ?></td>
                <td><?= h($amazonBook->description) ?></td> -->
                <!-- <td><?= $this->Number->format($amazonBook->condition_type) ?></td>
                <td><?= h($amazonBook->foreign_ship_flg) ?></td>
                <td><?= h($amazonBook->rapid_ship_flg) ?></td> -->
                
                <!-- <td><?= $this->Number->format($amazonBook->stocks) ?></td>
                <td><?= h($amazonBook->fulfillment_channel) ?></td>
                <td><?= h($amazonBook->merchant_shipping_group) ?></td>
                <td><?= $this->Number->format($amazonBook->point) ?></td>
                <td><?= h($amazonBook->created) ?></td>
                <td><?= h($amazonBook->modified) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $amazonBook->id]) ?>
                    <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $amazonBook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $amazonBook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amazonBook->id)]) ?> -->
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

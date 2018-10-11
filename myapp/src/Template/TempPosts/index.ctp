<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TempPost[]|\Cake\Collection\CollectionInterface $tempPosts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Temp Post'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tempPosts index large-9 medium-8 columns content">
    <h3><?= __('Temp Posts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('body') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tempPosts as $tempPost): ?>
            <tr>
                <td><?= $this->Number->format($tempPost->id) ?></td>
                <td><?= h($tempPost->title) ?></td>
                <td><?= h($tempPost->body) ?></td>
                <td><?= $this->Number->format($tempPost->cnt) ?></td>
                <td><?= h($tempPost->created) ?></td>
                <td><?= h($tempPost->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tempPost->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tempPost->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tempPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempPost->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TempPost $tempPost
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tempPost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tempPost->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Temp Posts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tempPosts form large-9 medium-8 columns content">
    <?= $this->Form->create($tempPost) ?>
    <fieldset>
        <legend><?= __('Edit Temp Post') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('cnt');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

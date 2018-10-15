
<?php
$this->assign('title', 'Edit Post');
?>


<h1>
    Edit Post
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right',
    'fs12']]); ?>
</h1>

<?= $this->Form->create($post); ?>
<?= $this->Form->input('title'); ?>
<?= $this->Form->input('body',['rows'=>'3']); ?>
<?= $this->Form->button('update'); ?>
<?= $this->Form->end(); ?>

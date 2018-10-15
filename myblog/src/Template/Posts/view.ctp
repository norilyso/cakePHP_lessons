<?php
$this->assign('title', 'Blog Detail');
?>


<h1>
    <?= h($post->title); ?>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right',
    'fs12']]); ?>
</h1>
<p>
    <?= nl2br(h($post->body)); ?>
</p>


<?php if (count($post->comments)) : ?>
<h2>
    Comments
</h2>
<p>
    <ul>
        <?php foreach ($post->comments as $comment): ?> 
            <li>
            <?= h($comment->body); ?>
            <?= $this->Form->Postlink(
                '[x]', 
                ['controller'=>'Comments','action'=>'delete', $comment->id],
                ['confirm'=>'Are you sure?','class'=>['fs12']]
                ); ?>
            </li>
        <?php endforeach; ?>
        
    </ul>
</p>
<?php endif; ?>

<h2>
    Add Comment
</h1>


<?= $this->Form->create(null, [
    'url' => ['controller'=>'Comments','action'=>'add']
]); ?>
<?= $this->Form->input('body'); ?>
<?= $this->Form->hidden('post_id',['value'=>$post->id]); ?>
<?= $this->Form->button('Add'); ?>
<?= $this->Form->end(); ?>

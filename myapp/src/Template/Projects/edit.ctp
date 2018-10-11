<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $project->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Edit Project') ?></legend>
        <?php
            echo $this->Form->control('project_number');
            echo $this->Form->control('segment');
            echo $this->Form->control('orderer');
            echo $this->Form->control('project_name');
            echo $this->Form->control('staff');
            echo $this->Form->control('team');
            echo $this->Form->control('contract_amount');
            echo $this->Form->control('estimate_amount');
            echo $this->Form->control('order_planed_month', ['empty' => true]);
            echo $this->Form->control('completion_planed_month', ['empty' => true]);
            echo $this->Form->control('completion_planed_term');
            echo $this->Form->control('probability_orders');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Segment') ?></th>
            <td><?= h($project->segment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orderer') ?></th>
            <td><?= h($project->orderer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Name') ?></th>
            <td><?= h($project->project_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= h($project->staff) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= h($project->team) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completion Planed Term') ?></th>
            <td><?= h($project->completion_planed_term) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project Number') ?></th>
            <td><?= $this->Number->format($project->project_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contract Amount') ?></th>
            <td><?= $this->Number->format($project->contract_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimate Amount') ?></th>
            <td><?= $this->Number->format($project->estimate_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Probability Orders') ?></th>
            <td><?= $this->Number->format($project->probability_orders) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Planed Month') ?></th>
            <td><?= h($project->order_planed_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completion Planed Month') ?></th>
            <td><?= h($project->completion_planed_month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($project->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($project->modified) ?></td>
        </tr>
    </table>
</div>

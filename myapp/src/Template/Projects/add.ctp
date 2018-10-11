<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Add Project') ?></legend>
        <?php
            echo $this->Form->control('project_number',[
                'label' => $arr_disp_name['project_number']
            ]);
            echo $this->Form->control('segment',[
                'label' =>  $arr_disp_name['segment']]
            );
            echo $this->Form->control('orderer',[
                'label' =>  $arr_disp_name['orderer']]
            );
            echo $this->Form->control('project_name',[
                'label' =>  $arr_disp_name['project_name']]
            );
            echo $this->Form->control('staff',[
                'label' =>  $arr_disp_name['staff']]
            );
            echo $this->Form->control('team',[
                'label' =>  $arr_disp_name['team']]
            );
            echo $this->Form->control('contract_amount',[
                'label' =>  $arr_disp_name['contract_amount']]
            );
            echo $this->Form->control('estimate_amount',[
                'label' =>  $arr_disp_name['estimate_amount']]
            );
            echo $this->Form->control('order_planed_month', [
                'empty' => true,
                'label' =>  $arr_disp_name['order_planed_month']
                ]);
            echo $this->Form->control('completion_planed_month', [
                'empty' => true,
                'label' =>  $arr_disp_name['completion_planed_month']
                ]);
            echo $this->Form->control('completion_planed_term',[
                'label' =>  $arr_disp_name['completion_planed_term']]
            );
            echo $this->Form->control('probability_orders',[
                'label' =>  $arr_disp_name['probability_orders']]
            );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

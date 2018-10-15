<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('新規案件登録'), ['action' => 'add']) ?></li>
        <li><?= $this->Form->postLink(__('案件情報　Excel出力'), 
                                    ['action' => 'exportExcel'], 
                                    ['confirm' => __('Excel出力します。\n処理が完了するまでしばらくお待ちください。')]) ?></li>
        
        <!-- <li><?= $this->Html->link(__('案件情報　Excel出力'), 
                                        ['action' => 'exportExcel',
                                        'target' => 'downloader']) ?></li> -->

    </ul>
    <iframe id="downloader" width="0" height="0" frameborder="0"></iframe>
</nav>
<div class="projects index large-10 medium-7 columns content">
    <h3><?= __('Projects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('project_number' ,$arr_disp_name['project_number']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('segment',$arr_disp_name['segment']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('orderer',$arr_disp_name['orderer']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_name',$arr_disp_name['project_name']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('staff',$arr_disp_name['staff']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('team',$arr_disp_name['team']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('contract_amount',$arr_disp_name['contract_amount']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('estimate_amount',$arr_disp_name['estimate_amount']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_planed_month',$arr_disp_name['order_planed_month']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('completion_planed_month',$arr_disp_name['completion_planed_month']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('completion_planed_term',$arr_disp_name['completion_planed_term']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= $this->Number->format($project->project_number) ?></td>
                <td><?= h($project->segment) ?></td>
                <td><?= h($project->orderer) ?></td>
                <td><?= h($project->project_name) ?></td>
                <td><?= h($project->staff) ?></td>
                <td><?= h($project->team) ?></td>
                <td><?= $this->Number->format($project->contract_amount) ?></td>
                <td><?= $this->Number->format($project->estimate_amount) ?></td>
                <td><?= h($project->order_planed_month->format('Y年m月')) ?></td>
                <td><?= h($project->completion_planed_month->format('Y年m月')) ?></td>
                <td><?= h($project->completion_planed_term) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?><br/>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?><br/>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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

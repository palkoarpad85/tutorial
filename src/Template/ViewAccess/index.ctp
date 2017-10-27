<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ViewAcces[]|\Cake\Collection\CollectionInterface $viewAccess
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New View Acces'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="viewAccess index large-9 medium-8 columns content">
    <h3><?= __('View Access') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('view_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('controller_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewAccess as $viewAcces): ?>
            <tr>
                <td><?= $this->Number->format($viewAcces->id) ?></td>
                <td><?= $viewAcces->has('role') ? $this->Html->link($viewAcces->role->name, ['controller' => 'Roles', 'action' => 'view', $viewAcces->role->id]) : '' ?></td>
                <td><?= h($viewAcces->view_name) ?></td>
                <td><?= h($viewAcces->controller_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $viewAcces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $viewAcces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $viewAcces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewAcces->id)]) ?>
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

<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ViewAcces $viewAcces
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit View Acces'), ['action' => 'edit', $viewAcces->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete View Acces'), ['action' => 'delete', $viewAcces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $viewAcces->id)]) ?> </li>
        <li><?= $this->Html->link(__('List View Access'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New View Acces'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="viewAccess view large-9 medium-8 columns content">
    <h3><?= h($viewAcces->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $viewAcces->has('role') ? $this->Html->link($viewAcces->role->name, ['controller' => 'Roles', 'action' => 'view', $viewAcces->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('View Name') ?></th>
            <td><?= h($viewAcces->view_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller Name') ?></th>
            <td><?= h($viewAcces->controller_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($viewAcces->id) ?></td>
        </tr>
    </table>
</div>

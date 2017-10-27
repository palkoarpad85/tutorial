<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $viewAcces->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $viewAcces->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List View Access'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="viewAccess form large-9 medium-8 columns content">
    <?= $this->Form->create($viewAcces) ?>
    <fieldset>
        <legend><?= __('Edit View Acces') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('view_name');
            echo $this->Form->control('controller_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

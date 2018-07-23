<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BoardsUser $boardsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Boards Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boardsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($boardsUser) ?>
    <fieldset>
        <legend><?= __('Add Boards User') ?></legend>
        <?php
            echo $this->Form->control('board_id', ['options' => $boards]);
            echo $this->Form->control('player_id', ['options' => $users]);
            echo $this->Form->control('coins');
            echo $this->Form->control('opc');
            echo $this->Form->control('minus');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

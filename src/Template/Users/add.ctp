<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('image_url');
            echo $this->Form->control('role');
            echo $this->Form->control('base_points');
            echo $this->Form->control('team_id', ['options' => $teams, 'empty' => true]);
            echo $this->Form->control('past_team_ids');
            echo $this->Form->control('bid_value');
            echo $this->Form->control('status');
            echo $this->Form->control('level_id', ['options' => $levels, 'empty' => true]);
            echo $this->Form->control('isPlayer');
            echo $this->Form->control('boards._ids', ['options' => $boards]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

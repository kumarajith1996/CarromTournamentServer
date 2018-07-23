<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Add Match') ?></legend>
        <?php
            echo $this->Form->control('team1_id');
            echo $this->Form->control('team2_id', ['options' => $teams]);
            echo $this->Form->control('stage_id', ['options' => $stages, 'empty' => true]);
            echo $this->Form->control('winner');
            echo $this->Form->control('team1_points');
            echo $this->Form->control('team2_points');
            echo $this->Form->control('refree');
            echo $this->Form->control('start_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

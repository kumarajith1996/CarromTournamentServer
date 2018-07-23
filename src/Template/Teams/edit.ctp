<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $team->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teams form large-9 medium-8 columns content">
    <?= $this->Form->create($team) ?>
    <fieldset>
        <legend><?= __('Edit Team') ?></legend>
        <?php
            echo $this->Form->control('tournament_id', ['options' => $tournaments, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('players');
            echo $this->Form->control('bid_points');
            echo $this->Form->control('played');
            echo $this->Form->control('won');
            echo $this->Form->control('points');
            echo $this->Form->control('loss');
            echo $this->Form->control('league');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

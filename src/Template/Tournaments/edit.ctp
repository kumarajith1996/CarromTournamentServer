<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tournament->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournaments form large-9 medium-8 columns content">
    <?= $this->Form->create($tournament) ?>
    <fieldset>
        <legend><?= __('Edit Tournament') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('start_date', ['empty' => true]);
            echo $this->Form->control('end_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

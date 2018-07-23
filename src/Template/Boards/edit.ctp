<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board $board
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $board->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boards form large-9 medium-8 columns content">
    <?= $this->Form->create($board) ?>
    <fieldset>
        <legend><?= __('Edit Board') ?></legend>
        <?php
            echo $this->Form->control('queen');
            echo $this->Form->control('finisher');
            echo $this->Form->control('match_id', ['options' => $matches]);
            echo $this->Form->control('turns');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

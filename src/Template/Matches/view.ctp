<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matches view large-9 medium-8 columns content">
    <h3><?= h($match->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= $match->has('team') ? $this->Html->link($match->team->name, ['controller' => 'Teams', 'action' => 'view', $match->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stage') ?></th>
            <td><?= $match->has('stage') ? $this->Html->link($match->stage->name, ['controller' => 'Stages', 'action' => 'view', $match->stage->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($match->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team1 Id') ?></th>
            <td><?= $this->Number->format($match->team1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Winner') ?></th>
            <td><?= $this->Number->format($match->winner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team1 Points') ?></th>
            <td><?= $this->Number->format($match->team1_points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team2 Points') ?></th>
            <td><?= $this->Number->format($match->team2_points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refree') ?></th>
            <td><?= $this->Number->format($match->refree) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($match->start_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Boards') ?></h4>
        <?php if (!empty($match->boards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Queen') ?></th>
                <th scope="col"><?= __('Finisher') ?></th>
                <th scope="col"><?= __('Match Id') ?></th>
                <th scope="col"><?= __('Turns') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($match->boards as $boards): ?>
            <tr>
                <td><?= h($boards->id) ?></td>
                <td><?= h($boards->queen) ?></td>
                <td><?= h($boards->finisher) ?></td>
                <td><?= h($boards->match_id) ?></td>
                <td><?= h($boards->turns) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Boards', 'action' => 'view', $boards->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Boards', 'action' => 'edit', $boards->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Boards', 'action' => 'delete', $boards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boards->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

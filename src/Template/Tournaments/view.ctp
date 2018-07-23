<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tournament'), ['action' => 'edit', $tournament->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tournaments view large-9 medium-8 columns content">
    <h3><?= h($tournament->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tournament->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tournament->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($tournament->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($tournament->end_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($tournament->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Players') ?></th>
                <th scope="col"><?= __('Bid Points') ?></th>
                <th scope="col"><?= __('Played') ?></th>
                <th scope="col"><?= __('Won') ?></th>
                <th scope="col"><?= __('Points') ?></th>
                <th scope="col"><?= __('Loss') ?></th>
                <th scope="col"><?= __('League') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tournament->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->tournament_id) ?></td>
                <td><?= h($teams->name) ?></td>
                <td><?= h($teams->players) ?></td>
                <td><?= h($teams->bid_points) ?></td>
                <td><?= h($teams->played) ?></td>
                <td><?= h($teams->won) ?></td>
                <td><?= h($teams->points) ?></td>
                <td><?= h($teams->loss) ?></td>
                <td><?= h($teams->league) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

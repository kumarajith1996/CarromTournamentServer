<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team[]|\Cake\Collection\CollectionInterface $teams
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teams index large-9 medium-8 columns content">
    <h3><?= __('Teams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tournament_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('players') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bid_points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('played') ?></th>
                <th scope="col"><?= $this->Paginator->sort('won') ?></th>
                <th scope="col"><?= $this->Paginator->sort('points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('loss') ?></th>
                <th scope="col"><?= $this->Paginator->sort('league') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team): ?>
            <tr>
                <td><?= $this->Number->format($team->id) ?></td>
                <td><?= $team->has('tournament') ? $this->Html->link($team->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $team->tournament->id]) : '' ?></td>
                <td><?= h($team->name) ?></td>
                <td><?= h($team->players) ?></td>
                <td><?= $this->Number->format($team->bid_points) ?></td>
                <td><?= $this->Number->format($team->played) ?></td>
                <td><?= $this->Number->format($team->won) ?></td>
                <td><?= $this->Number->format($team->points) ?></td>
                <td><?= $this->Number->format($team->loss) ?></td>
                <td><?= $this->Number->format($team->league) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $team->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $team->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

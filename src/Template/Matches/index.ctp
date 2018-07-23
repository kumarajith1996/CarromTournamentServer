<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match[]|\Cake\Collection\CollectionInterface $matches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matches index large-9 medium-8 columns content">
    <h3><?= __('Matches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team1_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stage_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('winner') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team1_points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team2_points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('refree') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= $this->Number->format($match->id) ?></td>
                <td><?= $this->Number->format($match->team1_id) ?></td>
                <td><?= $match->has('team') ? $this->Html->link($match->team->name, ['controller' => 'Teams', 'action' => 'view', $match->team->id]) : '' ?></td>
                <td><?= $match->has('stage') ? $this->Html->link($match->stage->name, ['controller' => 'Stages', 'action' => 'view', $match->stage->id]) : '' ?></td>
                <td><?= $this->Number->format($match->winner) ?></td>
                <td><?= $this->Number->format($match->team1_points) ?></td>
                <td><?= $this->Number->format($match->team2_points) ?></td>
                <td><?= $this->Number->format($match->refree) ?></td>
                <td><?= h($match->start_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $match->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $match->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?>
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

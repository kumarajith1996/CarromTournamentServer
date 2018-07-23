<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board[]|\Cake\Collection\CollectionInterface $boards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Board'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boards index large-9 medium-8 columns content">
    <h3><?= __('Boards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('queen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('finisher') ?></th>
                <th scope="col"><?= $this->Paginator->sort('match_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turns') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boards as $board): ?>
            <tr>
                <td><?= $this->Number->format($board->id) ?></td>
                <td><?= $this->Number->format($board->queen) ?></td>
                <td><?= $this->Number->format($board->finisher) ?></td>
                <td><?= $board->has('match') ? $this->Html->link($board->match->id, ['controller' => 'Matches', 'action' => 'view', $board->match->id]) : '' ?></td>
                <td><?= h($board->turns) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $board->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $board->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BoardsUser[]|\Cake\Collection\CollectionInterface $boardsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Boards User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boardsUsers index large-9 medium-8 columns content">
    <h3><?= __('Boards Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('board_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('player_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coins') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('minus') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boardsUsers as $boardsUser): ?>
            <tr>
                <td><?= $this->Number->format($boardsUser->id) ?></td>
                <td><?= $boardsUser->has('board') ? $this->Html->link($boardsUser->board->id, ['controller' => 'Boards', 'action' => 'view', $boardsUser->board->id]) : '' ?></td>
                <td><?= $boardsUser->has('user') ? $this->Html->link($boardsUser->user->name, ['controller' => 'Users', 'action' => 'view', $boardsUser->user->id]) : '' ?></td>
                <td><?= $this->Number->format($boardsUser->coins) ?></td>
                <td><?= $this->Number->format($boardsUser->opc) ?></td>
                <td><?= $this->Number->format($boardsUser->minus) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $boardsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $boardsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $boardsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boardsUser->id)]) ?>
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

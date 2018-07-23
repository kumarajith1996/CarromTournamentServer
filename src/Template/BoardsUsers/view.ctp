<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BoardsUser $boardsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Boards User'), ['action' => 'edit', $boardsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Boards User'), ['action' => 'delete', $boardsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boardsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boards Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boards User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="boardsUsers view large-9 medium-8 columns content">
    <h3><?= h($boardsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Board') ?></th>
            <td><?= $boardsUser->has('board') ? $this->Html->link($boardsUser->board->id, ['controller' => 'Boards', 'action' => 'view', $boardsUser->board->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $boardsUser->has('user') ? $this->Html->link($boardsUser->user->name, ['controller' => 'Users', 'action' => 'view', $boardsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($boardsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coins') ?></th>
            <td><?= $this->Number->format($boardsUser->coins) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opc') ?></th>
            <td><?= $this->Number->format($boardsUser->opc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minus') ?></th>
            <td><?= $this->Number->format($boardsUser->minus) ?></td>
        </tr>
    </table>
</div>

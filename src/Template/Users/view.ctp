<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['controller' => 'Boards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['controller' => 'Boards', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($user->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= $user->has('team') ? $this->Html->link($user->team->name, ['controller' => 'Teams', 'action' => 'view', $user->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Past Team Ids') ?></th>
            <td><?= h($user->past_team_ids) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $user->has('level') ? $this->Html->link($user->level->name, ['controller' => 'Levels', 'action' => 'view', $user->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Base Points') ?></th>
            <td><?= $this->Number->format($user->base_points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bid Value') ?></th>
            <td><?= $this->Number->format($user->bid_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $user->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsPlayer') ?></th>
            <td><?= $user->isPlayer ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Boards') ?></h4>
        <?php if (!empty($user->boards)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Queen') ?></th>
                <th scope="col"><?= __('Finisher') ?></th>
                <th scope="col"><?= __('Match Id') ?></th>
                <th scope="col"><?= __('Turns') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->boards as $boards): ?>
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

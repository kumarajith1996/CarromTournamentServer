<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board $board
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Board'), ['action' => 'edit', $board->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Board'), ['action' => 'delete', $board->id], ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Board'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="boards view large-9 medium-8 columns content">
    <h3><?= h($board->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Match') ?></th>
            <td><?= $board->has('match') ? $this->Html->link($board->match->id, ['controller' => 'Matches', 'action' => 'view', $board->match->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turns') ?></th>
            <td><?= h($board->turns) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($board->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Queen') ?></th>
            <td><?= $this->Number->format($board->queen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finisher') ?></th>
            <td><?= $this->Number->format($board->finisher) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($board->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Base Points') ?></th>
                <th scope="col"><?= __('Team Id') ?></th>
                <th scope="col"><?= __('Past Team Ids') ?></th>
                <th scope="col"><?= __('Bid Value') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('IsPlayer') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($board->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->image_url) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->base_points) ?></td>
                <td><?= h($users->team_id) ?></td>
                <td><?= h($users->past_team_ids) ?></td>
                <td><?= h($users->bid_value) ?></td>
                <td><?= h($users->status) ?></td>
                <td><?= h($users->level_id) ?></td>
                <td><?= h($users->isPlayer) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

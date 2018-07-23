<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stage'), ['action' => 'edit', $stage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stage'), ['action' => 'delete', $stage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stages view large-9 medium-8 columns content">
    <h3><?= h($stage->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($stage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stage->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Matches') ?></h4>
        <?php if (!empty($stage->matches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Team1 Id') ?></th>
                <th scope="col"><?= __('Team2 Id') ?></th>
                <th scope="col"><?= __('Stage Id') ?></th>
                <th scope="col"><?= __('Winner') ?></th>
                <th scope="col"><?= __('Team1 Points') ?></th>
                <th scope="col"><?= __('Team2 Points') ?></th>
                <th scope="col"><?= __('Refree') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stage->matches as $matches): ?>
            <tr>
                <td><?= h($matches->id) ?></td>
                <td><?= h($matches->team1_id) ?></td>
                <td><?= h($matches->team2_id) ?></td>
                <td><?= h($matches->stage_id) ?></td>
                <td><?= h($matches->winner) ?></td>
                <td><?= h($matches->team1_points) ?></td>
                <td><?= h($matches->team2_points) ?></td>
                <td><?= h($matches->refree) ?></td>
                <td><?= h($matches->start_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Matches', 'action' => 'view', $matches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Matches', 'action' => 'edit', $matches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Matches', 'action' => 'delete', $matches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

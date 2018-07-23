<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament[]|\Cake\Collection\CollectionInterface $tournaments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournaments index large-9 medium-8 columns content">
    <h3><?= __('Tournaments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tournaments as $tournament): ?>
            <tr>
                <td><?= $this->Number->format($tournament->id) ?></td>
                <td><?= h($tournament->name) ?></td>
                <td><?= h($tournament->start_date) ?></td>
                <td><?= h($tournament->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tournament->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tournament->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]) ?>
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

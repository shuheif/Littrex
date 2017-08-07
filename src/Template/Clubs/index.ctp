<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php if($auth->user('role') == 1): ?>
        <li><?= $this->Html->link(__('Add Club'), ['action' => 'add']) ?></li>
        <?php elseif($auth->user('role') != 5): ?>
        <li><?= $this->Html->link(__('My Clubs'), ['action' => 'myClubs']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Clubs List'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clubs index large-9 medium-8 columns content">
    <h3><?= __('Clubs List') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clubs as $club): ?>
            <tr>
                <td><?= $this->Html->image($this->Clubs->get_club_image($club), ['width' => '80px']) ?></td>
                <td><?= h($club->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $club->id]) ?>
                    <?php if($auth->user('role') == 1): ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'view', $club->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?>
                    <?php endif; ?>
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

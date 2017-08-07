<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($auth->user('role') == 1): ?>
        <li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Members List'), ['action' => 'members', $club->id]) ?> </li>
        <li><?= $this->Html->link(__('Clubs List'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="clubs view large-9 medium-8 columns content">
    <h3><?= h($club->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($club->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image($this->Clubs->get_club_image($club), ['width' => '80px']) ?> </td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($club->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Members') ?></h4>
        <?php if (!empty($club->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Middle Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($club->users as $users): ?>
            <tr>
                <td><?= $this->Html->image(($this->Users->get_profile_image($users)), ['width' => '50px']) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->middle_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->role_title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

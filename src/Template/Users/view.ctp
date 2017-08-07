<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($auth->user('id') == $user->id || $auth->user('role') == 1): ?>
        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $user->id]) ?> </li>
        <?php if($auth->user('role') == 1): ?>
        <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?><li>
        <?php if($user->role == 4): ?>
        <li><?= $this->Html->link(__('Add Relationship'), ['action' => 'addRelationship', $user->id]) ?></li>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->first_name) ?>
        <?= h($user->middle_name) ?>
        <?= h($user->last_name) ?>
    </h3>
    <?= $this->Users->get_role_name($user->role) ?>
    <?= $this->Html->image($this->Users->get_profile_image($user), ['width' => '100px']) ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('gender') ?></th>
            <td><?= $this->Users->get_gender($user->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) . ' ' . h($user->city) . ' ' . h($user->state) . ' '  . h($user->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($user->city) ?> </td>
        <tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($user->state) ?> </td>
        <tr>
        <tr>
            <th scope="row"><?= __('Zip Code') ?></th>
            <td><?= h($user->zip_code) ?> </td>
        <tr>
            <th scope="row"><?= __('Home Phone #') ?></th>
            <td><?= h($user->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellphone #') ?></th>
            <td><?= h($user->cell_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relationships') ?> </th>
            <?php if(!empty($user->users)): ?>
            <?php foreach($user->users as $relative): ?>
            <td><?= $this->Html->link(__('View'), ['action' => 'view', $parent->id]) ?></td>
            <?php endforeach; ?>
            <?php else: ?>
            <td>No relationship data</td>
            <?php endif; ?>
        </tr>
            </table>
    <div class="related">
        <h4><?= __('Clubs') ?></h4>
        <?php if (!empty($user->clubs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
            </tr>
            <?php foreach ($user->clubs as $clubs): ?>
            <tr>
                <td><?= h($clubs->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Courses') ?></h4>
        <?php if (!empty($user->courses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Department') ?></th>
                <th scope="col"><?= __('Number') ?></th>
            </tr>
            <?php foreach ($user->courses as $courses): ?>
            <tr>
                <td><?= h($courses->title) ?></td>
                <td><?= h($courses->department) ?></td>
                <td><?= h($courses->number) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

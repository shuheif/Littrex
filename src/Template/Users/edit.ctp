<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('End Editing'), ['action' => 'view', $user->id]) ?></li>
        <?php if($auth->user('role') == 1): ?>
        <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?><li>
        <?php if($user->role == 4): ?>
        <li><?= $this->Html->link(__('Add Relationship'), ['action' => 'addRelationship', $user->id]) ?></li>
        <?php endif; ?>
        <?php endif; ?>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
            <h3><?= h($user->first_name) ?>
                <?= h($user->middle_name) ?>
                <?= h($user->last_name) ?>
            </h3>
            <?= $this->Users->get_role_name($user->role) ?>
            <?= $this->Html->image($this->Users->get_profile_image($user), ['width' => '100px']) ?>
            <?php 
                if ($user->image) {
                    echo $this->Html->image('user_images/' . $user->image->filepath);
                } else {
                    echo $this->Html->image('profile_image.png');
                }
                echo $this->Form->input('image', ['type' => 'file']);
                echo $this->Form->input('gender', ['options' => [1 => 'male', 2 => 'female']]);
                echo $this->Form->input('email', ['type' => 'email']);
                echo $this->Form->input('password');
                echo $this->Form->input('address', ['required' => false]);
                echo $this->Form->input('city', ['required' => false]);
                echo $this->Form->input('state', ['required' => false]);
                echo $this->Form->input('zip_code', ['required' => false]);
                echo $this->Form->input('phone_number', ['label' => 'Home Phone #', 'required' => false]);
                echo $this->Form->input('cell_number', ['label' => 'Cellphone #', 'required' => false]);
            ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

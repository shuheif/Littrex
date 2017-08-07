<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Users List'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('role', ['options' => [1 => 'admin', 2 => 'faculty', 3 => 'student', 4 => 'parents', 5 => 'government']]);
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('gender', ['options' => [1 => 'male', 2 => 'female']]);
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

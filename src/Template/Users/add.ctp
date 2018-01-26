<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Add user</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
              <li><?= $this->Html->link(__('Users List'), ['action' => 'index', $user->id], ['class' => 'action-bar-before']) ?> </li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('role', ['options' => [1 => 'admin', 2 => 'instructor', 3 => 'student', 4 => 'parents', 5 => 'government', 6 => 'staff']]);
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

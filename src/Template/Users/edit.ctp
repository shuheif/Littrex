<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Edit Profile - <?= h($user->first_name . ' ' . $user->last_name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Profile'), ['action' => 'view', $user->id]) ?></li>
            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?><li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']) ?>
    <fieldset>
            <?= $this->Html->image($this->Users->get_profile_image($user), ['width' => '150px']) ?>
            <?= $this->Form->input('image', ['type' => 'file', 'allowEmpty' => true]) ?>
            <?
                echo $this->Form->input('first_name');
                echo $this->Form->input('middle_name');
                echo $this->Form->input('last_name');
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

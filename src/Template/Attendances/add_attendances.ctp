<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Attendances'), ['action' => 'courseAttendances', $course_id]) ?></li>
    </ul>
</nav>
<div class="attendances form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add Attendances') ?></legend>
        <?php
            echo $this->Form->input('date', ['required' => true]);
            foreach ($members as $member) {
                echo $member->first_name . $member->last_name;
                echo $this->Form->hidden('member_id', ['value' => $member->id]);
                echo $this->Form->checkbox('attendance');
                echo '</br>';
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

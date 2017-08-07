<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('View Assignments'), ['controller' => 'Assignments', 'action' => 'courseAssignments', $assignment->course_id]) ?></li>
    </ul>
</nav>
<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Submission') ?></legend>
        <?php
            echo $this->Form->hidden('assignment_id', ['value' => $assignment->id]);
            echo $this->Form->hidden('user_id', ['value' => $auth->user('id')]);
            echo $this->Form->input('comment');
            echo $this->Form->input('attachment', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $submission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Submissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission) ?>
    <fieldset>
        <legend><?= __('Edit Submission') ?></legend>
        <?php
            echo $this->Form->input('assignment_id', ['options' => $assignments]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('grade_id', ['options' => $grades, 'empty' => true]);
            echo $this->Form->input('submit_date', ['empty' => true]);
            echo $this->Form->input('attachment_id', ['options' => $attachments, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['action' => 'courseAssignments', $course_id]) ?></li>
        <li><?= $this->Html->link(__('View Course'), ['controller' => 'Courses', 'action' => 'view', $course_id]) ?></li>
    </ul>
</nav>
<div class="assignments form large-9 medium-8 columns content">
    <?= $this->Form->create($assignment) ?>
    <fieldset>
        <legend><?= __('Add Assignment') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('due_date', ['empty' => true]);
            echo $this->Form->hidden('course_id', ['value' => $course_id]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

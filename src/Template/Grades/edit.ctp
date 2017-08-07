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
                ['action' => 'delete', $grade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses Grades Users'), ['controller' => 'CoursesGradesUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Courses Grades User'), ['controller' => 'CoursesGradesUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses Users'), ['controller' => 'CoursesUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Courses User'), ['controller' => 'CoursesUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grades form large-9 medium-8 columns content">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <legend><?= __('Edit Grade') ?></legend>
        <?php
            echo $this->Form->input('grade');
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

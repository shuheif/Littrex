<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('End editing'), ['action' => 'view', $course->id]) ?></li>
    </ul>
</nav>
<div class="courses form large-9 medium-8 columns content">
    <?= $this->Form->create($course) ?>
    <fieldset>
        <legend><?= __('Edit Course') ?></legend>
            <td><?= h($course->department) ?></td>
            <td><?= $this->Number->format($course->number) ?></td>
            <td><?= h($course->title) ?></td>
            <td><?= $this->Form->input('syllabus', ['type' => 'textarea']) ?></td>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

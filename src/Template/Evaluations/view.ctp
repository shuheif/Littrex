<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evaluation'), ['action' => 'edit', $evaluation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evaluation'), ['action' => 'delete', $evaluation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evaluations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evaluations view large-9 medium-8 columns content">
    <h3><?= h($evaluation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $evaluation->has('user') ? $this->Html->link($evaluation->user->id, ['controller' => 'Users', 'action' => 'view', $evaluation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $evaluation->has('course') ? $this->Html->link($evaluation->course->title, ['controller' => 'Courses', 'action' => 'view', $evaluation->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evaluation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher Id') ?></th>
            <td><?= $this->Number->format($evaluation->teacher_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $this->Number->format($evaluation->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Rate') ?></th>
            <td><?= $this->Number->format($evaluation->skill_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prepared Rate') ?></th>
            <td><?= $this->Number->format($evaluation->prepared_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enthusiasm') ?></th>
            <td><?= $this->Number->format($evaluation->enthusiasm) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->comment)); ?>
    </div>
</div>

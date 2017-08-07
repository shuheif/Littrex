<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Submission'), ['action' => 'edit', $submission->id]) ?> </li>
        <li><?= $this->Html->link(__('Back to Assignment'), ['controller' => 'Assignments', 'action' => 'view', $assignment->id]) ?> </li>

    </ul>
</nav>
<div class="submissions view large-9 medium-8 columns content">
    <h3>Submission</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Assignment') ?></th>
            <td><?= h($assignment->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($submission->user->first_name . $submission->user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $submission->has('grade') ? $this->Html->link($submission->grade->title, ['controller' => 'Grades', 'action' => 'view', $submission->grade->id]) : $this->Html->link('Grade this submission', ['conroller' => 'Grades', 'action' => 'add', $submission->id]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attachment') ?></th>
            <td><?= $submission->has('attachment') ? $this->Html->link('Open uploaded file', ['controller' => 'Attachments', 'action' => 'view', $submission->attachment->id, 'target' => '_blank']) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submit Date') ?></th>
            <td><?= h($submission->submit_date) ?></td>
        </tr>
    </table>
</div>

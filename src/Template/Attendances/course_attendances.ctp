<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add Attendance'), ['action' => 'addAttendances', $course_id]) ?></li>
        <li><?= $this->Html->link(__('Back to Course'), ['controller' => 'Courses', 'action' => 'view', $course_id]) ?></li>
    </ul>
</nav>
<div class="attendances index large-9 medium-8 columns content">
    <h3><?= __('Attendances') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendances as $attendance): ?>
            <tr>
                <td><?= $this->Number->format($attendance->id) ?></td>
                <td><?= $attendance->has('user') ? $this->Html->link($attendance->user->id, ['controller' => 'Users', 'action' => 'view', $attendance->user->id]) : '' ?></td>
                <td><?= $attendance->has('course') ? $this->Html->link($attendance->course->title, ['controller' => 'Courses', 'action' => 'view', $attendance->course->id]) : '' ?></td>
                <td><?= h($attendance->attendance) ?></td>
                <td><?= h($attendance->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attendance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

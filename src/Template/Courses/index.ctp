<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($auth->user('role') == 1): ?>
        <li><?= $this->Html->link(__('Add Course'), ['action' => 'add']) ?></li>
        <?php elseif($auth->user('role') != 5): ?>
        <li><?= $this->Html->link(__('My Courses'), ['action' => 'myCourses']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Courses List'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="courses index large-9 medium-8 columns content">
    <h3><?= __('Courses List') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= h($course->title) ?></td>
                <td><?= h($course->department) ?></td>
                <td><?= $this->Number->format($course->number) ?></td>
                <td><?= $this->Number->format($course->teacher_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $course->id]) ?>
                    <?php if($auth->user('role') == 1): ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?>
                    <?php endif; ?>
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

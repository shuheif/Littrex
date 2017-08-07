<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grade'), ['action' => 'edit', $grade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grade'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses Grades Users'), ['controller' => 'CoursesGradesUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Grades User'), ['controller' => 'CoursesGradesUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses Users'), ['controller' => 'CoursesUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses User'), ['controller' => 'CoursesUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grades view large-9 medium-8 columns content">
    <h3><?= h($grade->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($grade->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($grade->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($grade->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($grade->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($grade->assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Due Date') ?></th>
                <th scope="col"><?= __('Submit Date') ?></th>
                <th scope="col"><?= __('Grade Id') ?></th>
                <th scope="col"><?= __('Attachment Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grade->assignments as $assignments): ?>
            <tr>
                <td><?= h($assignments->id) ?></td>
                <td><?= h($assignments->description) ?></td>
                <td><?= h($assignments->due_date) ?></td>
                <td><?= h($assignments->submit_date) ?></td>
                <td><?= h($assignments->grade_id) ?></td>
                <td><?= h($assignments->attachment_id) ?></td>
                <td><?= h($assignments->user_id) ?></td>
                <td><?= h($assignments->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $assignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Courses Grades Users') ?></h4>
        <?php if (!empty($grade->courses_grades_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Grade Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grade->courses_grades_users as $coursesGradesUsers): ?>
            <tr>
                <td><?= h($coursesGradesUsers->id) ?></td>
                <td><?= h($coursesGradesUsers->course_id) ?></td>
                <td><?= h($coursesGradesUsers->grade_id) ?></td>
                <td><?= h($coursesGradesUsers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CoursesGradesUsers', 'action' => 'view', $coursesGradesUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CoursesGradesUsers', 'action' => 'edit', $coursesGradesUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CoursesGradesUsers', 'action' => 'delete', $coursesGradesUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesGradesUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Courses Users') ?></h4>
        <?php if (!empty($grade->courses_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Grade Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grade->courses_users as $coursesUsers): ?>
            <tr>
                <td><?= h($coursesUsers->id) ?></td>
                <td><?= h($coursesUsers->course_id) ?></td>
                <td><?= h($coursesUsers->user_id) ?></td>
                <td><?= h($coursesUsers->grade_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CoursesUsers', 'action' => 'view', $coursesUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CoursesUsers', 'action' => 'edit', $coursesUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CoursesUsers', 'action' => 'delete', $coursesUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

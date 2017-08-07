<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($course->teacher_id == $auth->user('id') || $auth->user('role') == 1): ?>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <?php if ($course->teacher_id == $auth->user('id')): ?>
        <li><?= $this->Html->link(__('Edit Topics'), ['action' => 'edit_topics', $course->id]) ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Syllabus'), ['action' => 'syllabus', $course->id]) ?> </li>
        <?php if($auth->user('role') == 3): ?>
        <li><?= $this->Html->link(__('Attendances'), ['controller' => 'Attendances', 'actions' => 'userAttendances', $course->id, $auth->user('id')]) ?></li>
        <?php else: ?>
        <li><?= $this->Html->link(__('Attendances'), ['controller' => 'Attendances', 'action' => 'courseAttendances', $course->id]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Assignments'), ['controller' => 'Assignments', 'action' => 'courseAssignments', $course->id]) ?> </li>
        <li><?= $this->Html->link(__('Members List'), ['action' => 'members', $course->id]) ?> </li>
        <?php if($auth->user('role') != 1 && $auth->user('role') != 5): ?>
        <li><?= $this->Html->link(__('My Courses'), ['action' => 'myCourses']) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Courses List'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?php
        $title = h($course->department) 
            . $this->Number->format($course->number) . " "
            . ($course->title);
        echo $title;
    ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Instructor') ?></th>
            <td><?php
                echo $this->Html->link($teacher->first_name . " " . $teacher->last_name, ['controller' => 'Users', 'action' => 'view', $course->teacher_id]);
            ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Topics') ?></h4>
        <?php
            $dark = true;
            foreach ($topics as $topic) {
                if ($dark) {
        ?>
            <div style="background-color:#EDF7FF;">
        <?php } else { ?>
            <div>
        <?php } ?>
                <h5> <?= h($topic->title) ?> </h5>
                    <?= $this->Text->autoParagraph(h($topic->description)); ?>
                    <?php 
                        if (!empty($topic->attachments)) {
                            foreach ($topic->attachments as $attachment) {
                                echo $this->Html->link(h($attachment->title), ['controller' => 'Attachments', 'action' => 'view', $attachment->id], ['target' => '_blank']);
                            }
                        } 
                    ?>
            </div>
        <?php $dark = !$dark;
            }
        ?>
    </div>

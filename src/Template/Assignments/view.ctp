<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(__('Delete Assignment'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Assignments'), ['action' => 'courseAssignments', $assignment->course_id]) ?> </li>
        <li><?= $this->Html->link(__('New Assignment'), ['action' => 'add', $assignment->course_id]) ?> </li>
    </ul>
</nav>
<div class="assignments view large-9 medium-8 columns content">
    <h3><?= h($assignment->title) ?></h3>
    <table class="vertical-table">
       <tr>
            <th scope="row"><?= __('Due Date') ?></th>
            <td><?= h($assignment->due_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= $this->Text->autoParagraph(h($assignment->description)); ?></td>
        </tr>
   </table>
    <div class="related">
        <h4><?= __('Submissions') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('first_name') ?></th>
                <th scope="col"><?= __('last_name') ?></th>
                <th scope="col" class="actions"><?= __('Submission') ?></th>
            </tr>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= h($member->first_name) ?></td>
                <td><?= h($member->last_name) ?></td>
                <td><?php
                    foreach($submissions as $submission) {
                        if($submission->user_id == $member->id) {
                            echo $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submission->id]);
                            break;
                        }
                    } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

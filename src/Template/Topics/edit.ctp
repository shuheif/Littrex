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
                ['action' => 'delete', $topic->id, $course_id],
                ['confirm' => __('Are you sure you want to delete this topic?')]
            )
        ?></li>
        <li><?= $this->Html->link(__('Edit Topics'), ['controller' => 'Courses', 'action' => 'editTopics', $course_id]) ?></li>
    </ul>
</nav>
<div class="topics form large-9 medium-8 columns content">
    <?= $this->Form->create($topic) ?>
    <fieldset>
        <legend><?= __('Edit Topic') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            foreach($assignments as $assignment) {
                echo $this->Form->input('assignments._ids', ['options' => $assignments]);
            }
            foreach($attachments as $attachment) {
                echo $this->Form->input('attachments._ids', ['options' => $attachments]);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back to topics'), ['controller' => 'Courses', 'action' => 'edit_topics', $course_id]) ?></li>
    </ul>
</nav>
<div class="attachments form large-9 medium-8 columns content">
    <?= $this->Form->create($attachment, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Attachment') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('attachment', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

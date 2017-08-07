<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Topics'), ['controller' => 'Courses', 'action' => 'editTopics', $course_id]) ?></li>
    </ul>
</nav>
<div class="topics form large-9 medium-8 columns content">
    <?= $this->Form->create($new_topic) ?>
    <fieldset>
        <legend><?= __('Add Topic') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

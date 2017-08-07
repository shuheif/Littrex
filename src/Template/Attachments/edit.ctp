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
                ['action' => 'delete', $attachment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachments form large-9 medium-8 columns content">
    <?= $this->Form->create($attachment) ?>
    <fieldset>
        <legend><?= __('Edit Attachment') ?></legend>
        <?php
            echo $this->Form->input('filename');
            echo $this->Form->input('cells._ids', ['options' => $cells]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

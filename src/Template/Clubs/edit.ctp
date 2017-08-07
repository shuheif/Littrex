<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('End editing'), ['action' => 'view', $club->id]) ?></li>
    </ul>
</nav>
<div class="clubs form large-9 medium-8 columns content">
    <?= $this->Form->create($club, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Club') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('image', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

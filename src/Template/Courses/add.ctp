<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="courses form large-9 medium-8 columns content">
    <?= $this->Form->create($course) ?>
    <fieldset>
        <legend><?= __('Add Course') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('department');
            echo $this->Form->input('number');
            echo $this->Form->input('room');
            echo $this->Form->textarea('syllabus', ['label' => 'syllabus']);
            echo $this->Form->input('teacher_id', ['options' => $options]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

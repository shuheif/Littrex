<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Course & Instructor Evaluation</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' .$course->title), 
                ['controller' => 'Courses', 'action' => 'view', $course->id]) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="evaluations form large-9 medium-8 columns content">
    <?= $this->Form->create($evaluation) ?>
    <fieldset>
        <legend><?= h($teacher->first_name . ' ' . $teacher->last_name . ' Evaluation') ?></legend>
        <?php
            echo $this->Form->input('rate', ['label' => 'Overall Evaluation', 'placeholder' => 'Evaluate with five stars']);
            echo $this->Form->input('skill_rate', ['label' => 'Is the instructor skillfull?', 'placeholder' => 'Evaluate with five stars']);
            echo $this->Form->input('prepared_rate', ['label' => 'Was the instructor well-prepared for the classes?', 'placeholder' => 'Evaluate with five stars']);
            echo $this->Form->input('enthusiasm', ['label' => 'Is the instructor enthusiastic?', 'placeholder' => 'Evaluate with five stars']);
            echo $this->Form->input('comment', ['type' => 'textarea', 'label' => 'Comments']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

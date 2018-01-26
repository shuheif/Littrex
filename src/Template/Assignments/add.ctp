<?php
/**
  * @var \App\View\AppView $this
  */
?>
<body>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          Add Assignments - 
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Assignments List'), ['action' => 'courseAssignments', $course->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="assignments form large-9 medium-8 columns content">
    <?= $this->Form->create($assignment) ?>
    <fieldset>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('due_date', ['empty' => true]);
            echo $this->Form->hidden('course_id', ['value' => $course->id]);

        ?>
    </fieldset>

</div>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>

</div>


<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Add Grade - <?= h($course->department) . $this->Number->Format($course->number) . ' ' . h($course->title) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
              <li><?= $this->Html->link(h($course->department) . $this->Number->Format($course->number) . ' ' . h($course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?> </li>
              <li><?= $this->Html->link(__('Grades List'), ['controller' => 'Grades', 'action' => 'courseGrades', $course->id]) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="grades form large-9 medium-8 columns content">
    <?= $this->Form->create($grade) ?>
    <fieldset>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

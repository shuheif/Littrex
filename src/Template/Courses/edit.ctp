<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          Edit - 
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="courses form large-9 medium-8 columns content">
    <?= $this->Form->create($course, ['type' => 'file']) ?>
    <fieldset>
            <td><?= $this->Form->input('department') ?></td>
            <td><?= $this->Form->input('number') ?></td>
            <td><?= $this->Form->input('title') ?></td>
            <td><?= $this->Form->input('room') ?></td>
            <td><?= $this->Form->input('syllabus', ['type' => 'textarea']) ?></td>
            <td>
            <?php 
                if ($course->image) {
                    echo $this->Html->image('user_images/' . $course->image->filepath);
                } else {
                    echo $this->Html->image('profile_image.png');
                }
                echo $this->Form->input('image', ['type' => 'file']);
            ?></td>
    </fieldset>
    <?= $this->Form->submit(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Attendances - Edit</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Attendances'), ['controller' => 'Classevents', 'action' => 'view', $attendance->classevent_id], 
                ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attendance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id), 'class' => 'action-bar-before']
            )
            ?></li>

            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="attendances form large-9 medium-8 columns content">
    <?= $this->Form->create($attendance) ?>
    <fieldset>
        <legend><?= __('Edit Attendance') ?></legend>
        <?php
            echo $this->Form->input('attendance');
            echo $this->Form->input('memo', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Edit School - <?= h($school->name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
                <li><?= $this->Html->link(__('Schools List'), ['action' => 'index']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="schools form large-9 medium-8 columns content">
    <?= $this->Form->create($school, ['type' => 'file']) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('image', ['type' => 'file', 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

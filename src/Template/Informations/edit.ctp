<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Edit Informations</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Government Informations'), ['action' => 'governmentInfo'], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('School Informations'), ['action' => 'schoolInfo'], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="informations form large-9 medium-8 columns content">
    <?= $this->Form->create($information) ?>
    <fieldset>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

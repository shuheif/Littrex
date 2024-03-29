<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Edit Forum - <?= h($forum->name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Forums List'), ['action' => 'index']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="forums form large-9 medium-8 columns content">
    <?= $this->Form->create($forum) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

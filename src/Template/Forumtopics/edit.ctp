<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Edit - <?= h($forumTopic->name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($forum->name), ['controller' => 'Forums', 'action' => 'view', $forum->id], 
                ['class' => 'action-bar-before']) ?> </li>
            <li><?= $this->Html->link(h($forumTopic->name), ['action' => 'view', $forumTopic->id], 
                ['class' => 'action-bar-before']) ?> </li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="forumTopics form large-9 medium-8 columns content">
    <?= $this->Form->create($forumTopic) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>
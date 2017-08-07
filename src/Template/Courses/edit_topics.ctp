<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('End editing'), ['action' => 'view', $course_id]) ?></li>
    </ul>
</nav>
<div class="courses index large-9 medium-8 columns content">
    <h3><?= __('Topics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <?= $this->Html->link(__('Add a topic here'), ['controller' => 'Topics', 'action' => 'add', 1, $course_id]) ?>
        <?php
            $dark = true;
            foreach ($topics as $topic) {
                if ($dark) {
        ?>
            <div style="background-color:#EDF7FF;">
        <?php } else { ?>
            <div>
        <?php } ?>
                <h5> <?= h($topic->title) ?> </h5>
                    <?= h($topic->description) ?></br>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Topics', 'action' => 'edit', $topic->id, $course_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Topics', 'action' => 'delete', $topic->id, $course_id], ['confirm' => __('Are you sure you want to delete this topic?')]) ?>
                    <?= $this->Html->link(__('Add attachments'), ['controller' => 'Attachments', 'action' => 'add', $topic->id, $course_id]) ?>
                    <?= $this->Html->link(__('Add assignments'), ['controller' => 'Assignments', 'action' => 'add', $topic->id, $course_id]) ?><br/>
                    <?= $this->Html->link(__('Add a topic here'), ['controller' => 'Topics', 'action' => 'add', $topic->topic_index + 1, $course_id]) ?>
            </div>
        <?php $dark = !$dark;
            }
        ?>
    </table>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('View Course'), ['action' => 'view', $course->id]) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?php
        $title = h($course->department) 
            . $this->Number->format($course->number) . " "
            . ($course->title);
        echo $title;
    ?></h3>
    <div class="row">
        <h4><?= __('Syllabus') ?></h4>
        <?= $this->Text->autoParagraph(h($course->syllabus)); ?>
    </div>
</div>

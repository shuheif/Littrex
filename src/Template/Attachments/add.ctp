<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Add attachment</h3>
  </nav>
</section>

<div class="attachments form large-9 medium-8 columns content">
    <?= $this->Form->create($attachment, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Attachment') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('attachment', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>

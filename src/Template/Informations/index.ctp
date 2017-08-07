<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($auth->user('role') == 1 || $auth->user('role') == 5): ?>
        <li><?= $this->Html->link(__('Add Information'), ['action' => 'add']) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('School Information'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Government Information'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="informations index large-9 medium-8 columns content">
    <h3><?= __('School Informations') ?></h3>
    <?php foreach ($informations as $information): ?>
        <h4><?= h($information->title) ?></h4>
        <?php echo nl2br(h($information->description)) ?><br/>
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $information->id]) ?>
        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?>
    <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

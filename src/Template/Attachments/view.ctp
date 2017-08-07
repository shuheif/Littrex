<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
    </ul>
</nav>
<div class="attachments view large-9 medium-8 columns content">
    <h3><?= h($attachment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Filename') ?></th>
            <td><?= h($attachment->filename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attachment->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Assignments') ?></h4>
        <?php if (!empty($attachment->assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Due Date') ?></th>
                <th scope="col"><?= __('Submit Date') ?></th>
                <th scope="col"><?= __('Grade Id') ?></th>
                <th scope="col"><?= __('Attachment Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attachment->assignments as $assignments): ?>
            <tr>
                <td><?= h($assignments->id) ?></td>
                <td><?= h($assignments->description) ?></td>
                <td><?= h($assignments->due_date) ?></td>
                <td><?= h($assignments->submit_date) ?></td>
                <td><?= h($assignments->grade_id) ?></td>
                <td><?= h($assignments->attachment_id) ?></td>
                <td><?= h($assignments->user_id) ?></td>
                <td><?= h($assignments->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Assignments', 'action' => 'view', $assignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Assignments', 'action' => 'edit', $assignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assignments', 'action' => 'delete', $assignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cells') ?></h4>
        <?php if (!empty($attachment->cells)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Cell Index') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Assignment Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attachment->cells as $cells): ?>
            <tr>
                <td><?= h($cells->id) ?></td>
                <td><?= h($cells->course_id) ?></td>
                <td><?= h($cells->cell_index) ?></td>
                <td><?= h($cells->title) ?></td>
                <td><?= h($cells->description) ?></td>
                <td><?= h($cells->assignment_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cells', 'action' => 'view', $cells->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cells', 'action' => 'edit', $cells->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cells', 'action' => 'delete', $cells->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cells->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Edit Topic</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Topics List'), ['controller' => 'Courses', 'action' => 'editTopics', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $topic->id, $course_id],
                ['confirm' => __('Are you sure you want to delete this topic?')])?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<div class="topics form large-9 medium-8 columns content">
    <?= $this->Form->create($topic) ?>
    <fieldset>
        <?= $this->Form->input('title') ?>
        <?= $this->Form->input('description') ?>
        
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">Attachments</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <th scope="row"><?= __('Attachment Name') ?></th>
                                <td><?php if (!empty($topic->attachments)): ?>
                                <?php foreach($topic->attachments as $attachment): ?>
                                    <?= $this->Html->link(h($attachment->title), ['controller' => 'Attachments', 'action' => 'download', $attachment->id],
                                            ['target' => '_blank']) ?>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <p>No attachmnets</p>
                                <?php endif; ?>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Actions') ?></th>
                                <td><?= $this->Html->link(__('Add attachments'), 
                                ['controller' => 'Attachments', 'action' => 'add', $topic->id, $course->id]) ?></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">Assignments</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <th scope="row"><?= __('Assignment Name') ?></th>
                                <td><?php if (!empty($topic->assignments)): ?>
            <?php foreach($topic->assignments as $assignment): ?>
                <?= $this->Html->link(h($assignment->title), ['controller' => 'Assignments', 'action' => 'view', $assignment->id]) ?>
            <?php endforeach; ?> 
            <?php else: ?>
            <p>No assignments</p>
        <?php endif; ?>
            </td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Actions') ?></th>
                                <td><?= $this->Html->link(__('Link assignments'), 
            ['controller' => 'Topics', 'action' => 'linkAssignment', $topic->id, $course->id]) ?></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>


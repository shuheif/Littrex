<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
    <h3 style="margin: 20px 0px 0px 25px">Edit Announcements - <?= h($club->name) ?></h3>
    <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
      <ul class="nav navbar-nav action-bar">
        <li><?= $this->Html->link(h($club->name), ['action' => 'view', $club->id]) ?></li>
      </ul>
    </div><!--/.container-fluid -->
  </nav>
</section>

<section class="content">
  <div class="container">
    <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Announcements') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <th>Topics</th>
              <th>Attachments</th>
              <th>Assignments</th>
              <th>Actions</th>
            </thead>
            <tbody>
              <tr>                   
                <tr>
                  <td><?= $this->Html->link(__('Add a topic here'), 
                    ['controller' => 'Announcements', 'action' => 'add', 1, $club->id]) ?></td>
                  </tr>
                  <?php foreach ($announcements as $topic): ?>
                    <tr>
                      <td>
                        <h4><?= h($topic->title) ?></h4>
                        <?= $this->Text->autoParagraph(h($topic->description)); ?>
                        
                        <div style="padding-left: 25px;">
                          <h5><strong>Attachments</strong></h5>
                          <?php if (!empty($topic->attachments)): ?>
                            <?php foreach($topic->attachments as $attachment): ?>
                              <li><?= $this->Html->link(h($attachment->title), ['controller' => 'Attachments', 'action' => 'download', $attachment->id], ['target' => '_blank']) ?></li>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <p>No attachments linked</p>
                          <?php endif; ?>
                          
                          <h5><strong>Assignments</strong></h5>
                          <?php if(!empty($topic->assignments)): ?>
                            <?php foreach($topic->assignments as $assignment): ?>
                              <li><?= $this->Html->link(h($assignment->title), ['controller' => 'Assignments', 'action' => 'view', $assignment->id]) ?></li>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <p>No assignment linked</p>
                          <?php endif; ?>
                        </div>
                      </td>
                      <td>
                        <?= $this->Html->link(__('Add attachments'), 
                        ['controller' => 'Attachments', 'action' => 'add', $topic->id, $course->id]) ?></td>
                        <td>
                          <?= $this->Html->link(__('Link assignments'), 
                          ['controller' => 'Topics', 'action' => 'linkAssignment', $topic->id, $course->id]) ?>
                        </td>
                        <td>
                          <li style="list-style: none;"><?= $this->Html->link(__('Edit'), ['controller' => 'Topics', 'action' => 'edit', $topic->id, $course->id]) ?></li>
                          <li style="list-style: none;"><?= $this->Form->postLink(__('Delete'), ['controller' => 'Topics', 'action' => 'delete', $topic->id, $course->id], ['confirm' => __('Are you sure you want to delete this topic?')]) ?></li>
                        </td>
                      </tr>
                      <tr>
                        <td><?= $this->Html->link(__('Add a topic here'), 
                          ['controller' => 'Topics', 'action' => 'add', $topic->topic_index + 1, $course->id]) ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </section>

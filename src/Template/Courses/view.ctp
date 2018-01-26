<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <?php if($auth->user('role') == 1 || $auth->user('role') == 2): ?>
            <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
            <?php if($auth->user('role') == 1 || $auth->user('role') == 2): ?>
            <li><?= $this->Html->link(__('Edit Announcements'), ['action' => 'editTopics', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
            <?php if(!$auth->user('role') == 1): ?>
            <li><?= $this->Html->link(__('Instructor'), ['controller' => 'Users', 'action' => 'view', $course->teacher_id], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
            <li><?= $this->Html->link(__('Members'), ['action' => 'members', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Syllabus'), ['action' => 'syllabus', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Attendances'), ['controller' => 'Classevents', 'action' => 'eventsWithCourse', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Assignments'), ['controller' => 'Assignments', 'action' => 'courseAssignments', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Grades'), ['controller' => 'Grades', 'action' => 'courseGrades', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Forum'), ['controller' => 'Forums', 'action' => 'view', $course->forum_id], ['class' => 'action-bar-before']) ?></li>
            <?php if ($course->evaluation_opened): ?>
            <?php if($auth->user('role') == 1): ?>
            <li><?= $this->Html->link(__('Evaluations'), ['controller' => 'Evaluations', 'action' => 'courseEvaluations', $course->id]) ?></li>
            <?php endif; ?>
            <?php if ($auth->user('role') == 3): ?>
            <li><?= $this->Html->link(__('Evaluation'), ['controller' => 'Evaluations', 'action' => 'add', $course->id, $auth->user('id')]) ?></li>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($auth->user('id') == $course->teacher_id && !$course->evaluation_opened): ?>
            <li><?= $this->Html->link(__('Open Evaluation Form'), ['action' => 'openEvaluation', $course->id]) ?></li>
            <?php endif; ?>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="box">
              <div class="box-header">
                <h3 class="box-title"><?= __('Announcements') ?></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody>
                  <?php foreach ($topics as $topic): ?>
                  <tr>
                    <td>
                    <h4> <?= h($topic->title) ?> </h4>
                    <?= $this->Text->autoParagraph(h($topic->description)); ?>
                    <h5><strong>Attachments</strong></h5>
                    <?php 
                        if (!empty($topic->attachments)) {
                          foreach ($topic->attachments as $attachment) {
                          echo $this->Html->link(h($attachment->title), ['controller' => 'Attachments', 'action' => 'download', $attachment->id], ['target' => '_blank']);
                          echo "</br>";
                                      }
                                  } 
                          
                      ?>
                      <h5><strong>Assignments</strong></h5>
                      <?php
                        if (!empty($topic->assignments)) {
                          foreach($topic->assignments as $assignment) {
                            echo $this->Html->link(h($assignment->title), ['controller' => 'Assignments', 'action' => 'view', $assignment->id]);
                            echo "</br>";
                                      }
                                  }
                              ?>
                      </td>
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
            </div>
            </section>

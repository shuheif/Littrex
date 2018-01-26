<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          Submission - 
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(h($assignment->title), ['controller' => 'Assignments', 'action' => 'view', $assignment->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
<div class="container">
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" >
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">View Result</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                      <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <th scope="row"><?= __('Assignment Title') ?></th>
                                <td><?= h($assignment->title) ?></td>
                            </tr>
                          </tr>
                              <tr>
                                <th scope="row"><?= __('Assignment Description') ?></th>
                                <td><?= $this->Text->autoParagraph(h($assignment->description)) ?></td>
                              </tr>
                              <tr>
                                <tr>
                                    <th scope="row"><?= __('Student name') ?></th>
                                    <td><?= h($submission->user->first_name . ' ' . $submission->user->last_name) ?></td>
                                </tr>
                              </tr>
                                <th scope="row"><?= __('Score') ?></th>
                                <td><?php
                                    if ($submission->has('result')) {
                                        echo $this->Number->Format($assignment->result->score);
                                    } else {
                                        if ($assignment->grade != null) {
                                            echo $this->Html->link('Grade this submission', ['conroller' => 'Results', 'action' => 'add', $assignment->grade->id, $submission->user->id]);
                                        } else {
                                            echo "Grades information is not available for this assignment";
                                        }
                                    }
                                ?></td>
                              </tr>
                              <tr>
                                <tr>
                                    <th scope="row"><?= __('Score comment') ?></th>
                                    <td><?= $submission->has('result') ? $this->Text->autoParagraph(h($submission->result->comment)) : '' ?></td>
                              </tr> 
                              <tr>
                                <th scope="row"><?= __('Attachment') ?></th>
                                <td><?= $submission->has('attachment') ? $this->Html->link('Download uploaded file', ['controller' => 'Attachments', 'action' => 'download', $submission->attachment->id], ['target' => '_blank']) : '' ?></td>
                              </tr> 
                              <tr>
                                <th scope="row"><?= __('Submit Date') ?></th>
                                <td><?= h($submission->submit_date) ?></td>
                              </tr> 
                              <tr>
                                <th scope="row"><?= __('Submission comment') ?></th>
                                <td><?= $this->Text->autoParagraph(h($submission->comment)) ?></td>
                              </tr> 
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>
</section>

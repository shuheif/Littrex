<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Score - <?= h($grade->title) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(h($grade->title), ['controller' => 'Grades', 'action' => 'view', $grade->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
<div class="container">
    <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12" >
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">View Result</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                      <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <th scope="row"><?= __('User') ?></th>
                            <td><?= $result->has('user') ? $this->Html->link(h($result->user->first_name . ' ' . $result->user->last_name), ['controller' => 'Users', 'action' => 'view', $result->user->id]) : '' ?></td>
                            </tr>
                          </tr>
                          <tr>
                            <th scope="row"><?= __('Grade Title') ?></th>
                            <td><?= h($grade->title) ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><?= __('Grade Description') ?></th>
                            <td><?= $this->Text->autoParagraph(h($grade->description)) ?></td>
                          </tr>
                            <th scope="row"><?= __('Score') ?></th>
                            <td><?= $this->Number->format($result->score) ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><?= __('Score Comment') ?></th>
                            <td><?= $this->Text->autoParagraph(h($result->comment)) ?></td>
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
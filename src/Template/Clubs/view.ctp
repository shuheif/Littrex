<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          <?= h($club->name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <?php if($auth->user('role') == 1 || $auth->user('role') == 2): ?>
            <li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Edit Announcements'), ['action' => 'editAnnouncements', $club->id], ['class' => 'action-bar-before']) ?></li>
          <?php endif; ?>
            <li><?= $this->Html->link(__('Clubs List'), ['action' => 'index'], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Members'), ['action' => 'members', $club->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Forum'), ['controller' => 'Forums', 'action' => 'view', $club->forum_id], ['class' => 'action-bar-before']) ?></li>
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
                  <?php foreach ($announcements as $topic): ?>
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


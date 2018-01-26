<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Link Assignment</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Edit Topics'), ['controller' => 'Courses', 'action' => 'editTopics', $course_id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                </tr>
                </thead>
                <?php foreach ($assignments as $assignment): ?>
                    <tbody>
                    <tr>
                        <td><?= h($assignment->title) ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink(__('Link to the topic'), ['action' => 'linkAssignment', $topic_id, $course_id, $assignment->id]) ?>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

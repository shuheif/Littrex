<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
        <h3 style="margin: 20px 0px 0px 25px"><?= h($assignment->title) ?></3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department) . $this->Number->Format($course->number) . ' ' . h($course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Assignments List'), ['controller' => 'Assignments', 'action' => 'courseAssignments', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php if($auth->user('role') == 1 || $auth->user('role') == 2 ): ?>
            <li><?= $this->Form->postLink(__('Delete this assignment'), ['action' => 'delete', $assignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignment->id), 'class' => 'action-bar-before']) ?></li>
          <?php endif; ?>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
               <div class="col-md-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">General Information</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <th scope="row"><?= __('Due Date') ?></th>
                                <td><?= h($assignment->due_date) ?></td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Description') ?></th>
                                <td><?= $this->Text->autoParagraph(h($assignment->description)); ?></td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Submission') ?></th>
                                <?php
                                $hasData = false;
                                foreach($submissions as $submission) {
                                    if ($submission->user_id == $auth->user('id')) {
                                        echo "<td>";
                                        echo $this->Html->link(__('Review my submission'), ['controller' => 'Submissions', 'action' => 'view', $submission->id]);
                                        echo "</td>";
                                        $hasData = true;
                                        break;
                                    }
                                }
                                if (!$hasData) {
                                    echo "<td>";
                                    echo $this->Html->link(__('Submit'), 
                                        ['controller' => 'Submissions', 'action' => 'add', $assignment->id]);
                                    echo "</td>";
                                } ?>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-7">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                   <h3 style="padding-left: 10px;" class="box-head">Submissions</h3>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                       <tr>
                            <th scope="col"><?= __('First Name') ?></th>
                            <th scope="col"><?= __('Last Name') ?></th>
                            <th scope="col" class="actions"><?= __('Submission') ?></th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php foreach ($submissions as $submission): ?>
                            <tr>
                                <td><?= h($submission->user->first_name) ?></td>
                                <td><?= h($submission->user->last_name) ?></td>
                                <td><?= $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submission->id]) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php $this->end(); ?>

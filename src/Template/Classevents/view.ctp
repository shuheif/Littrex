<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Attendances - <?= h($classevent->title . ' ' . $classevent->date) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), 
                ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Attendances'), ['controller' => 'Classevents', 'action' => 'eventsWithCourse', $course->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('attendance') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('memo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= h($member->first_name) ?></td>
                        <td><?= h($member->last_name) ?></td>
                        <?php
                            $attended = false;
                            foreach($classevent->attendances as $attendance) {
                                if($attendance->user_id == $member->id) {
                                    echo "<td>" . h($attendance->attendance) . "</td><td>";
                                    echo h($attendance->memo);
                                    echo "</td><td>";
                                    if($auth->user('role') == 1 || $auth->user('role') == 2) {
                                    echo $this->Html->link(__('Edit'), ['controller' => 'Attendances', 'action' => 'edit', $attendance->id]);
                                    echo "</td>";
                                  }
                                    $attended = true;
                                    break;
                                }
                            }
                            if (!$attended) {
                                echo "<td>";
                                if($auth->user('role') == 1 || $auth->user('role') == 2) {
                                echo $this->Form->postLink(__('Register as attendance'), ['controller' => 'Attendances', 'action' => 'addAttendance', $classevent->id, $member->id]);
                                echo " / ";
                                echo $this->Form->postLink(__('Register as absent'), ['controller' => 'Attendances', 'action' => 'addAbsent', $classevent->id, $member->id]);
                              }
                                echo"</td><td></td><td></td>";
                            }
                        ?>
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

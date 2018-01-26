<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Grades - <?= h($user->first_name . ' ' . $user->last_name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), 
                ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Member'), ['controller' => 'Courses', 'action' => 'members', $course->id], ['class' => 'action-bar-before']) ?></li>
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
                    <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('results') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($grades as $grade): ?>
                    <tr>
                        <td><?= h($grade->title) ?></td>
                        <?php
                            $hasData = false;
                            foreach($results as $result) {
                                if($result->grade_id == $grade->id) {
                                    echo "<td>" . h($result->score) . "</td><td>";
                                    echo h($result->comment);
                                    echo "</td><td><li>";
                                    echo $this->Html->link(__('Edit'), ['controller' => 'Results', 'action' => 'edit', $result->id]);
                                    echo "</li></td>";
                                    $hasData = true;
                                    break;
                                }
                            }
                            if (!$hasData) {
                                echo "<td></td><td></td><td></td>";
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

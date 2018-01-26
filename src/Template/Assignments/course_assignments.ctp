<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Assignments List - 
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php if ($auth->user('id') == $course->teacher_id): ?>
            <li><?= $this->Html->link(__('Add assignment'), ['action' => 'add', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
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
                    <th scope="col"><?= $this->Paginator->sort('due_date') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($assignments as $assignment): ?>
                    <tr>
                        <td><?= h($assignment->due_date) ?></td>
                        <td><?= h($assignment->title) ?></td>
                        <td><?= h($assignment->description) ?></td>
                        <td><?= $this->Html->link(__('View'), ['action' => 'view', $assignment->id]) ?></td>
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

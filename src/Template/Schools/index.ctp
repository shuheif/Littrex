<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Schools List</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
                <li><?= $this->Html->link(__('Add School'), ['action' => 'add']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($schools as $school): ?>
                    <tr>
                        <td><?= $this->Html->image($this->Schools->get_school_image($school), ['width' => '100px']) ?></td>
                        <td><?= $this->Html->link(h($school->name), "http://littrex.com//") ?></td>
                        <td>
                            <li><?= $this->Html->link(__('Staffs'), ['controller' => 'Users', 'action' => 'staffs']) ?></li>
                            <li><?= $this->Html->link(__('Teachers'), ['controller' => 'Users', 'action' => 'teachers']) ?></li>
                            <li><?= $this->Html->link(__('Students'), ['controller' => 'Users', 'action' => 'students']) ?></li>

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

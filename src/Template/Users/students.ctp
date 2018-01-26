<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Students List</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
               <li><?= $this->Html->link(__('My Profile'), ['action' => 'view', $auth->user('id')], 
                    ['class' => 'action-bar-before']) ?></li>
                <li><?= $this->Html->link(__('Teachers'), ['action' => 'teachers'], ['class' => 'action-bar-before']) ?></li>
                <li><?= $this->Html->link(__('Staffs'), ['action' => 'staffs'], ['class' => 'action-bar-before']) ?></li>
                <li><?= $this->Html->link(__('Users List'), ['action' => 'index']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

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
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('middle_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image_id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($users as $staff): ?>
                    <tr>
                        <td><?= h($staff->email) ?></td>
                        <td><?= h($staff->first_name) ?></td>
                        <td><?= h($staff->last_name) ?></td>
                        <td><?= h($staff->middle_name) ?></td>
                        <td><?= $this->Users->get_role_name($staff->role) ?></td>
                        <td><?= $this->Html->image($this->Users->get_profile_image($staff), ['width' => '100px']) ?></td>
                        <td class="actions">
                            <li><?= $this->Html->link(__('View'), ['action' => 'view', $staff->id]) ?></li>
                            <?php if($auth->user('role') == 1): ?>
                            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->id]) ?></li>
                            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?></li>
                            <?php endif; ?>
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

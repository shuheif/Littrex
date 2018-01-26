<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Grades View - <?= h($grade->title) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link("Grades List", ['action' => 'courseGrades', $course->id], ['class' => 'action-bar-before']) ?></li>
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
                                <th scope="row"><?= __('Title') ?></th>
                                <td><?= h($grade->title) ?></td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Description') ?></th>
                                <td><?= $this->Text->autoParagraph(h($grade->description)); ?></td>
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
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                       <tr>
                            <th scope="col"><?= __('First Name') ?></th>
                            <th scope="col"><?= __('Last Name') ?></th>
                            <th scope="col" class="actions"><?= __('Grade') ?></th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php foreach ($members as $member): ?>
                            <tr>
                                <td><?= h($member->first_name) ?></td>
                                <td><?= h($member->last_name) ?></td>
                                <td><?php
                                    $hasResult = false;
                                    foreach($results as $result) {
                                        if ($result->user_id == $member->id) {
                                            echo "<li>";
                                            echo $this->Html->link(__('View'), ['controller' => 'Results', 'action' => 'view', $result->id]);
                                            echo "</li>";
                                            $hasResult = true;
                                            break;
                                        }
                                    }
                                    if (!$hasResult && ($auth->user('role') == 1 || $auth->user('role') == 2)) {
                                        echo "<li>";
                                        echo $this->Html->link(__('Register Score'), ['controller' => 'Results', 'action' => 'add', $grade->id, $member->id]);
                                        echo "</li>";
                                    } ?></td>
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

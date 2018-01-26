<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Forum - <?= h($forum->name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
                <?php if($auth->user('role') == 1 || $auth->user('role') == 2): ?>
                <li><?= $this->Html->link(__('Edit Forum'), ['action' => 'edit', $forum->id], ['class' => 'action-bar-before']) ?> </li>
                <li><?= $this->Form->postLink(__('Delete Forum'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id), 'class' => 'action-bar-before']) ?> </li>
            <?php endif; ?>
                <li><?= $this->Html->link(__('Add Topic'), ['controller' => 'Forumtopics', 'action' => 'add', $forum->id], ['class' => 'action-bar-before']) ?> </li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Topics</h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= __('Topics') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col"><?= __('Topic Owner') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($forum_topics as $forumTopics): ?>
                    <tr>
                    <td><?= h($forumTopics->name) ?></td>
                    <td><?= h($forumTopics->content) ?></td>
                    <td><?= h($forumTopics->created) ?></td>
                    <td><?= h($forumTopics->modified) ?></td>
                    <td><?= h($forumTopics->user->first_name . ' ' . $forumTopics->user->last_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Forumtopics', 'action' => 'view', $forumTopics->id]) ?></br>
                        <?php if($auth->user('role') == 1 || $auth->user('role') == 2): ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Forumtopics', 'action' => 'edit', $forumTopics->id]) ?></br>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Forumtopics', 'action' => 'delete', $forumTopics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumTopics->id)]) ?>
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


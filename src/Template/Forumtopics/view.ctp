<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px"><?= h($forumTopic->name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
                <li><?= $this->Html->link(h($forumTopic->forum->name), ['controller' => 'Forums', 'action' => 'view', $forumTopic->forum_id], ['class' => 'action-bar-before']) ?> </li>
                <?php if($auth->user('role') == 1): ?>
                <li><?= $this->Html->link(__('Edit Topic'), ['controller' => 'Forumtopics', 'action' => 'edit', $forumTopic->id], 
                    ['class' => 'action-bar-before']) ?> </li>
                <li><?= $this->Form->postLink(__('Delete Topic'), ['action' => 'delete', $forumTopic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumTopic->id), 'class' => 'action-bar-before']) ?> </li>
              <?php endif; ?>
                <li><?= $this->Html->link(__('Post'), ['controller' => 'Posts', 'action' => 'add', $forumTopic->forum_id, $forumTopic->id], 
                    ['class' => 'action-bar-before']) ?> </li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
        <div class="container">
            <div class="row">
               <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">Topic Information</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <th scope="row"><?= __('Name') ?></th>
                                <td><?= h($forumTopic->name) ?></td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Topic Owner') ?></th>
                                <td><?= $forumTopic->has('user') ? $this->Html->link(h($forumTopic->user->first_name . ' ' . $forumTopic->user->last_name), ['controller' => 'Users', 'action' => 'view', $forumTopic->user->id]) : '' ?></td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= h($forumTopic->created) ?></td>
                              </tr>
                              <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= h($forumTopic->modified) ?></td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                  <div class="box-header">
                <h3 class="box-title" style="display: inline-block;"><strong>Description: </strong></h3>
                <h4 style="display: inline-block;"><?= $this->Text->autoParagraph(h($forumTopic->content)); ?></h4>
                </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                       <tr>
                            <th scope="col"><?= __('Name') ?></th>
                            <th scope="col"><?= __('Replies') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php if(!empty($posts)): ?>
                            <?php foreach ($posts as $post): ?>
                            <tr>
                              <td>
                                <?= h($post->user->first_name . ' ' . $post->user->last_name) ?>
                              </td>
                              <td>
                                <?= h($post->content) ?>
                              </td>
                              <td>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $post->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <h4>No posts yet.</h4>
                            <?php endif; ?>
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


<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">School Informations</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Government Informations'), ['action' => 'governmentInfo'], ['class' => 'action-bar-before']) ?></li>
            <?php if($auth->user('role') == 1 || $auth->user('role') == 6): ?>
            <li><?= $this->Html->link(__('Add Information'), ['action' => 'add'], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="box">
              <div class="box-header">
                <h3 class="box-title"><?= __('Announcements') ?></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody>
                  <?php foreach ($informations as $information): ?>
                    <tr>
                    <td>
                    <h4><?= h($information->title) ?></h4>
                    <?php echo nl2br(h($information->description)) ?><br/>
                    <?php if($auth->user('role') == 1 || $auth->user('role') == 6): ?>
                    <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $information->id]) ?></li>
                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?></li>
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
          </div>
</div>
</section>

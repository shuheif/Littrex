<?php
/**
  * @var \App\View\AppView $this
  */
?>

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
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $information->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?>
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
<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Your notifications</h3>
  </nav>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="box">
              <div class="box-header">
              <?php if(!empty($notifications)): ?>
                <h3 class="box-title">You have <?= $this->Number->format(count($notifications)) ?> notifications</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tbody>
                  <?php foreach($notifications as $notification): ?>
                    <tr>
                    <td>
                    <?= $this->Html->link($notification['title'],
                    ['controller' => $notification['controller'], 'action' => $notification['action'], $notification['variable1']]) ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
                <?php else: ?>
          <h3>You have no notifications</h3>
          <?php endif; ?>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
          </div>
</div>
</section>

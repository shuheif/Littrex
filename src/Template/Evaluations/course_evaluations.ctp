<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Evaluations List - <?= h($course->department . $course->number . ' ' . $course->title) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), 
                ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

    <!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('overrall_rate') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('skill_rate') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('prepared_rate') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('enthusiasm') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($evaluations as $evaluation): ?>
                    <tr>
                        <td><?= h($evaluation->rate) ?></td>
                    <td><?= $this->Number->format($evaluation->skill_rate) ?></td>
                    <td><?= $this->Number->format($evaluation->prepared_rate) ?></td>
                    <td><?= $this->Number->format($evaluation->enthusiasm) ?></td>
                    <td><?= h($evaluation->comment) ?></td>
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


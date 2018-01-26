<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Courses List</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('My Courses'), ['action' => 'myCourses'], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
            <div class="row">
            <?php foreach ($courses as $course): ?>
            <div class="col-xs-6 col-lg-3">
            <a href="/Courses/view/<?php echo $this->Number->Format($course->id) ?>">
              <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                        <?php echo $this->Html->image($this->Courses->get_course_image($course), ['alt' => 'User Avatar', 'class' => 'img-circle']); ?>
                    </div>
                      <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?= h($course->department) ?> <?= $this->Number->Format($course->number) ?></h3>
                    <h5 class="widget-user-desc"><?= h($course->title) ?></h5>
                </div>
              </a>
                <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="#">Classroom<span class="pull-right badge bg-green"><?= h($course->room) ?></span></a></li>
                        <li></li>
                        <a style="width: 75%; margin: auto; margin-top: 10px; margin-bottom: 10px"href="/Courses/view/<?php echo $this->Number->Format($course->id) ?>" type="button" class="btn btn-block btn-primary">View Course</a>
                      </ul>
                </div>
              </div>
            </div><!--/.col-xs-6.col-lg-4-->
            <?php endforeach; ?>
        </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
</section>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
        <div class="container-fluid">
          <h3 style="margin: 20px 0px 0px 25px">My Clubs</h3>
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link("Clubs List", ['action' => 'index']) ?></li>
            </ul>
            </div>
    </nav>
</section>

<section class="content">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
            <?php foreach ($clubs as $club): ?>
            <div class="col-xs-6 col-lg-3 col-md-3">
            <a href="/Clubs/view/<?php echo $this->Number->Format($club->id) ?>">
              <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                        <?php echo $this->Html->image($this->Clubs->get_club_image($club), ['alt' => 'User Avatar', 'class' => 'img-circle', 'style' => 'margin-top: -10px;']); ?>
                    </div>
                      <!-- /.widget-user-image -->
                    <h5 class="widget-user-username"> <?= h($club->name) ?></h5>
                </div>
              </a>
                <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <a style="width: 75%; margin: auto; margin-top: 10px; margin-bottom: 10px" href="/Clubs/view/<?php echo $this->Number->Format($club->id) ?>" type="button" class="btn btn-block btn-primary">View Club</a>
                      </ul>
                </div>
              </div>
            </div><!--/.col-xs-6.col-lg-4-->
            <?php endforeach; ?>
        </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
</section>


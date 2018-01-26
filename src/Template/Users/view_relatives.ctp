<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Relatives - <?= h($user->first_name . ' ' . $user->last_name) ?></h3>
            <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($user->first_name . ' ' . $user->last_name), ['action' => 'view', $user->id], ['class' => 'action-bar-before']) ?></li>
            <?php if ($auth->user('role') == 1): ?>
            <li><?= $this->Html->link(__('Add Relative'), ['action' => 'addRelative', $user->id], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
            <div class="row">
            <?php if (!empty($children)): ?>
              <?php foreach ($children as $child): ?>
            <div class="col-xs-6 col-lg-4">
            <a href="/Users/view/<?php echo $this->Number->Format($child->id) ?>">
              <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                        <?= $this->Html->image($this->Users->get_profile_image($child), ['alt' => 'User Avatar', 'class' => 'img-circle', 'style' => 'margin-top: -10px']) ?>
                    </div>
                    <h5 class="widget-user-username"><?= h($child->first_name . ' ' . $child->last_name)?></h5>
                </div>
              </a>
                <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <div style="text-align: center;">
                        <h4><strong>School: </strong>Royal College Curepipe</h4>
                        <img width=75px height=75px src="http://littrex.com/img/rcc_logo.jpg">
                        </div>
                        <a style="width: 75%; margin: auto; margin-top: 10px; margin-bottom: 10px"href="/Users/view/<?php echo $this->Number->Format($child->id) ?>" type="button" class="btn btn-block btn-primary">View Child</a>
                      </ul>
                </div>
              </div>
            </div><!--/.col-xs-6.col-lg-4-->
            <?php endforeach; ?>
            <? else: ?>
            <?= h($user->first_name . ' ' . $user->last_name . ' has no relatives data') ?>
            <? endif; ?>
        </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
</section>

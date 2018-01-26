<?php
/**
  * @var \App\View\AppView $this
  */
?>

<html>
<head>

</head>
<body>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
      <h3 style="margin: 20px 0px 0px 25px">Profile</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
              <li><?= $this->Html->link(__('My Profile'), ['action' => 'view', $auth->user('id')], ['class' => 'action-bar-before']) ?></li>
              <!-- Only for the owner and the admin -->
              <?php if($auth->user('id') == $user->id || $auth->user('role') == 1): ?>
              <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $user->id], ['class' => 'action-bar-before']) ?></li>
              <?php if($auth->user('role') == 1): ?>
              <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], 
                    ['class' => 'action-bar-before', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?><li>
              <?php if($auth->user('role') == 1 || $auth->user('id') == $user->id): ?>
              <?php if($user->role == 3): ?>
              <li><?= $this->Html->link(__('Add Relative'), ['action' => 'addRelative', $user->id], 
                    ['class' => 'action-bar-before']) ?></li>
              <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
              <?php if($user->role == 4): ?>
              <li><?= $this->Html->link(__('Children'), ['action' => 'viewRelatives', $user->id], 
                    ['class' => 'action-bar-before']) ?></li>
              <?php endif; ?>
              <?php if($user->role == 3): ?>
              <li><?= $this->Html->link(__('Grades'), ['action' => 'viewGrades', $user->id], ['class' => 'action-bar-before']) ?></li>
              <li><?= $this->Html->link(__('Attendances'), ['action' => 'viewAttendances', $user->id], ['class' => 'action-bar-before']) ?></li>
              <?php endif; ?>
              <li><?= $this->Html->link(__('Users List'), ['action' => 'index']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content" style="padding-top: 0px;">     
<div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">
              <?= h($user->first_name) ?>
              <?= h($user->middle_name) ?>
              <?= h($user->last_name) ?></h3>
            </div>
            <div class="widget-user-image">
              <?php echo $this->Html->image($this->Users->get_profile_image($user), ['alt' => 'User Avatar', 'class' => 'img-circle']); ?>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header">Role</h5>
                    <span class="description-text"><?= $this->Users->get_role_name($user->role) ?></span>
                    <?php if($user->role == 2): ?>
                    <?php if($rate > 0): ?>
                    <span class="description-text">Evaluation: <?= $this->Number->format($rate) ?> / 5</span>
                    <?php else: ?>
                    <span class="description-text">Evaluation: No data</span>
                    <?php endif; ?>
                    <?php endif; ?>
                    <div>
                  <a style="text-align: center;" href="http://littrex.com/pages/mailbox/compose">
                  <button style="margin-top: 5px;" type="button" class="btn btn-primary">Message</button>
                  </a>
                  </div>
                  </div>
                  <!-- /.description-block -->
                </div>               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      </div>
    </div>
<div class="container">
      <div class="row">
        <div class="col-md-6 <?php if ($user->role == 4 || $user->role == 5): ?>col-md-offset-3 <?php endif;?> ">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">General Information</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th scope="row"><?= __('Gender') ?></th>
                        <td><?= $this->Users->get_gender($user->gender) ?></td>
                      </tr>
                      <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                      </tr>
                      <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($user->address) . ' ' . h($user->city) . ' ' . h($user->state) . ' '  . h($user->zip_code) ?></td>
                      </tr>
                        <th scope="row"><?= __('City') ?></th>
                        <td><?= h($user->city) ?> </td>
                      </tr>
                      <tr>
                        <th scope="row"><?= __('State') ?></th>
                        <td><?= h($user->state) ?> </td>
                      </tr>
                      <tr>
                        <th scope="row"><?= __('Zip Code') ?></th>
                        <td><?= h($user->zip_code) ?> </td>
                      </tr>
                        <th scope="row"><?= __('Home Phone #') ?></th>
                        <td><?= h($user->phone_number) ?></td>
                      </td>
                      </tr>
                        <th scope="row"><?= __('Cellphone #') ?></th>
                        <td><?= h($user->cell_number) ?></td>
                      </tr>
                        <th scope="row"><?= __('Parents') ?> </th>
                        <?php if(!empty($relatives)): ?><td>
                        <?php foreach($relatives as $relative): ?>
                            <?php foreach($parents as $parent) {
                                if ($parent->id == $relative->parent_id) {
                                    echo $this->Html->link(h($parent->first_name . ' ' . $parent->last_name . ' - ' . $relative->relationship), ['action' => 'view', $parent->id]);
                                    echo "</br>";
                                }
                            } ?>
                        <?php endforeach; ?></td>
                        <?php else: ?>
                        <td>No relationship data</td>
                        <?php endif; ?>                 
                      </tr>  
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Courses box -->
        
        <div class="col-md-6" > 
        <div class="row">
        <?php if ($user->role == 2 || $user->role == 3): ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Courses</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                  <?php if (!empty($user->courses)): ?>
                      <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <th scope="col"><?= __('Title') ?></th>
                                <th scope="col"><?= __('Department') ?></th>
                                <th scope="col"><?= __('Number') ?></th>
                            </tr> 
                            <?php foreach ($user->courses as $course): ?>
                            <tr>
                                <td><?= $this->Html->link(h($course->title), ['controller' => 'Courses', 'action' => 'view', $course->id]) ?></td>
                                <td><?= h($course->department) ?></td>
                                <td><?= h($course->number) ?></td>
                            </tr>
                            <?php endforeach; ?> 
                        </tbody>
                      </table>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <!-- Courses box -->

              <!-- Clubs box -->
            <?php if ($user->role != 4 && $user->role != 5): ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Clubs</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                  <?php if (!empty($user->clubs)): ?>
                  <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <th scope="col"><?= __('Name') ?></th>
                            </tr>
                            <?php foreach ($user->clubs as $club): ?>
                            <tr>
                                <td><?= $this->Html->link(h($club->name), ['controller' => 'Clubs', 'action' => 'view' , $club->id]) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
</body>
</html>

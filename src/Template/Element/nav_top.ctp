<!DOCTYPE html>
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <?php if($auth->user('role') == 2 || $auth->user('role') == 3): ?>
    <div class="navbar-custom-menu navbar-left">
        <ul class="nav navbar-nav"> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Your Course <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              <?php foreach ($courses as $course): ?>
                    <li><a href="/Courses/view/<?php echo $this->Number->Format($course->id) ?>"><?= h($course->department) ?> <?= $this->Number->Format($course->number) ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
        </ul>
    </div>
    <?php endif; ?>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                    </div>
                                    <h4>
                                        Assignment Duedate
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Did you finish your assignment?</p>
                                </a>
                            </li>
                            <!-- end message -->
                        </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <?php if(!empty($notifications)): ?>
                    <span class="label label-warning"><?= $this->Number->format(count($notifications)) ?></span>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu">
                    <?php if(!empty($notifications)): ?>
                    <li class="header">You have <?= $this->Number->format(count($notifications)) ?> notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                        <?php foreach($notifications as $notification): ?>
                            <li><?= $this->Html->link($notification['title'],
                            ['controller' => $notification['controller'], 'action' => $notification['action'], $notification['variable1']]) ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="footer"><?= $this->Html->link("See All Notifications", 
                        ['controller' => 'Notifications', 'action' => 'index']) ?></li>
                    <?php else: ?>
                    <li class="header">You have no notifications</li>
                    <?php endif; ?>
                </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag-o"></i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Design some buttons
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end task item -->
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php 
                    if ($profile_image) {
                        $filename = $profile_image->filepath . DS . $profile_image->filename;
                    } else {
                        $filename = 'profile_image.png';
                    }
                    echo $this->Html->image($filename, array('class' => 'user-image', 'alt' => 'User Image')); ?>
                    <span class="hidden-xs"><?= h($auth->user('first_name') . ' ' . $auth->user('last_name')) ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <?php
                            $filename = $profile_image ? $profile_image->filepath . DS . $profile_image->filename : 'profile_image.png';
                            echo $this->Html->image($filename, array('class' => 'img-circle', 'alt' => 'User Image'));
                            //echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image'));
                        ?>
                        <p>
                            <?= h($auth->user('first_name') . ' ' .  $auth->user('last_name')) ?>
                            <small><?= $this->Users->get_role_name($auth->user('role')) ?></small>
                        </p>
                    </li>
                    <!-- <li class="user-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#">Attendance</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Grade</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Setting</a>
                            </div>
                        </div>
                        
                    </li> -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view', $auth->user('id')], ['class' => 'btn btn-default btn-flat']) ?>
                        </div>
                        <div class="pull-right">
                            <?= $this->Html->link(__('Sign out'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-default btn-flat']) ?>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

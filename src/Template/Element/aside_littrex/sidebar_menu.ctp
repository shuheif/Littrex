<!DOCTYPE html>
<ul class="sidebar-menu">

    <!-- Dashboard -->
    <li class="treeview">
        <a href="http://littrex.com/Pages/dashboard">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Above Dashboard -->
    <?php if($auth->user('role') == 2): ?>
    <li class="treeview">
        <a href="http://littrex.com/pages/mailbox/compose2">
            <i class="fa fa-briefcase"></i>
            <span>Scheme of work</span>
        </a>
    </li>
    <li class="treeview">
        <a href="http://littrex.com/pages/mailbox/compose2">
            <i class="fa fa-calendar-plus-o"></i>
            <span>Week Plan </span>
        </a>
    </li>
    <li class="treeview">
        <a href="http://littrex.com/pages/mailbox/compose2">
            <i class="fa fa-calendar-check-o"></i>
            <span>Daily Lesson Plan</span>
        </a>
    </li>
    <?php endif; ?>
    <!-- My Profile -->
    <!-- Only for governmnet -->
    <?php if($auth->user('role') == 5 || $auth->user('role') == 4): ?>
    <li class="">
        <a href="http://littrex.com/users/view/<?php echo $auth->user('id'); ?>">
            <i class="fa fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>
    <?php endif; ?>
    <!-- My profile -->

    <!-- School List Link -->
    <!-- Only For Government -->
    <?php if($auth->user('role') == 5): ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Schools</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
	        <li><?= $this->Html->link(__('Schools List'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Add School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        </ul>
    </li>
    <?php endif; ?>
    <!-- Above School list -->
   
    <!-- Students List --> 
    <!-- Only for admins --!>
    <?php if($auth->user('role') == 1): ?>
    <li class="">
        <a href="http://littrex.com/users/students">
            <i class="fa fa-male fa-lg"></i>
            <span>Students</span>
        </a>
    </li>
    <?php endif; ?>
    <!-- Students List -->


    <!-- Courses -->
    <!-- Only Students, teachers and admins -->
    <?php if($auth->user('role') == 1 || $auth->user('role') == 2 || $auth->user('role') == 3): ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Courses</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <!-- Only studens and teachers -->
            <?php if($auth->user('role') == 2 || $auth->user('role') == 3 || $auth->user('role') == 4): ?>
	        <li><?= $this->Html->link(__('My Courses'), ['controller' => 'Courses', 'action' => 'myCourses']) ?> </li>
            <?php endif; ?>
            <li><?= $this->Html->link(__('Courses List'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
            <!-- Only admin -->
            <?php if($auth->user('role') == 1): ?>
            <li><?= $this->Html->link(__('Add Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>
    <!-- Course -->

    <!-- Clubs -->
    <!-- Only for students, teachers, admins, staffs -->
    <?php if($auth->user('role') != 4 && $auth->user('role') != 5): ?>
    <li class="treeview">
    	<a>
            <i class="fa fa-users"></i>
            <span>Clubs</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><?= $this->Html->link(__('My Clubs'), ['controller' => 'Clubs', 'action' => 'myClubs', $auth->user('id')]) ?> </li>
            <li><?= $this->Html->link(__('Clubs List'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
            <!-- Only for admin -->
            <?php if($auth->user('role') == 1): ?>
            <li><?= $this->Html->link(__('Add Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
            <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>
    <!-- Clubs -->

    <?php if($auth->user('role') == 4): ?>
    <li class="treeview">
        <a href="http://littrex.com/users/viewRelatives/<?php echo $auth->user('id'); ?>">
            <i class="fa fa-child"></i>
            <span>My Childs</span>
        </a>
    </li>
    <?php endif; ?>

    <!-- Users -->
    <!-- Other than governments -->
    <?php if($auth->user('role') != 5 && $auth->user('role') != 4): ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Users</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><?= $this->Html->link(__('My Profile'), ['controller' => 'Users', 'action' => 'view', $auth->user('id')], ['style' => 'fa fa-circle-o']) ?></li>
    
            <li><?= $this->Html->link(__('Students'), ['controller' => 'Users', 'action' => 'students'], ['style' => 'fa fa-circle-o']) ?></li>
            <li><?= $this->Html->link(__('Teachers'), ['controller' => 'Users', 'action' => 'teachers'], ['style' => 'fa fa-circle-o']) ?></li>
            <li><?= $this->Html->link(__('Staffs'), ['controller' => 'Users', 'action' => 'staffs'], ['style' => 'fa fa-circle-o']) ?></li>
            <li><?= $this->Html->link(__('Users List'), ['controller' => 'Users', 'action' => 'index'], ['style' => 'fa fa-circle-o']) ?></li>

            <!-- Only admin -->
            <?php if($auth->user('role') == 1): ?>
            <li><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add'], ['style' => 'fa fa-circle-o']) ?></li>
            <?php endif; ?>
            <!-- Above only admin -->
        </ul>
    </li>
    <?php endif; ?>
    <!-- Above Users -->

    <!-- Informations -->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Information</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <?php if($auth->user('role') != 5): ?>
            <li><?= $this->Html->link(__('School Information'), ['controller' => 'Informations', 'action' => 'school-info']) ?> </li>
            <?php endif; ?>
            <li><?= $this->Html->link(__('Government Information'), ['controller' => 'Informations', 'action' => 'government-info']) ?> </li>
            <!-- Only for admin and government -->
            <?php if($auth->user('role') == 1 || $auth->user('role') == 5): ?>
            <li><?= $this->Html->link(__('Add Information'), ['controller' => 'Informations', 'action' => 'add']) ?> </li>
            <?php endif; ?>
        </ul>
    </li>
    <!-- Avobe informations -->

    <!-- Notifications -->
    <li>
        <a href="http://littrex.com/notifications">
            <i class="fa fa-bell"></i> <span>Notifications</span>
            <?php if(!empty($notifications)): ?>
            <small class="label pull-right bg-red"><?= $this->Number->format(count($notifications)) ?></small>
            <?php endif; ?>
        </a>
    </li>
    <!-- Above notifications -->

    <!-- Only for students, teachers, staffs, admins and parents -->
    <?php if($auth->user('role') != 5): ?>
    <!-- Calendar -->
    <li>
        <a href="http://littrex.com/full-calendar">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
        </a>
    </li>
    <?php endif; ?>
    <!-- Above calendar -->

    <!-- Messages box -->    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-envelope"></i> <span>Message Box</span>
            <small class="label pull-right bg-yellow">12</small>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/pages/mailbox/mailbox'); ?>">Inbox <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/pages/mailbox/compose'); ?>">Compose</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/mailbox/read-mail'); ?>">Read</a></li>
        </ul>
    </li>
    <!-- Above messages -->

    <!-- Only Students, teachers, admin -->
    <?php if($auth->user('role') == 1 || $auth->user('role') == 2 || $auth->user('role') == 3): ?>
    <!-- Forums -->
    <li class="">
        <a href="http://littrex.com/forums/">
            <i class="fa fa-forumbee"></i>
            <span>Forums</span>
        </a>
    </li>
    <?php endif; ?>
    <!-- Above Forums -->


    <!-- Only for Students, teachers and admins --> 
    <!-- Government Link -->
    <li class="">
        <a href="http://ministry-education.govmu.org/English/Pages/default.aspx" target="_blank">
            <i class="fa fa-building"></i>
            <span>Ministry of Education</span>
        </a>
    </li>
    <!-- Above government link -->

</ul>

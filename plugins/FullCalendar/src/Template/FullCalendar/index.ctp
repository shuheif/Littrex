<?php
/*
 * Template/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">My Calendar</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(__('Add an Event', true), ['controller' => 'events', 'action' => 'add'], ['class' => 'action-bar-before']) ?></li>
			<li><?= $this->Html->link(__('Manage Events', true), ['controller' => 'events'], ['class' => 'action-bar-before']) ?></li>
			<li><?= $this->Html->link(__('Manage Events Types', true), ['controller' => 'event_types'], ['class' => 'action-bar-before']) ?></li>	
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
	<div class="Calendar index" style="border: 1px solid grey;">
		<div id="calendar"></div>
	</div>
</section>

<?= $this->Html->css('/full_calendar/css/fullcalendar.min', ['plugin' => true]); ?>
<?= $this->Html->css('/full_calendar/css/jquery.qtip.min', ['plugin' => true]); ?>
<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') ?>
<?= $this->Html->script('/full_calendar/js/lib/moment.min.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/fullcalendar.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/jquery.qtip.min.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/ready.js', ['plugin' => true]); ?>
<?php
/*
 * Template/Events/view.ctp
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
          <h3 style="margin: 20px 0px 0px 25px">View Event</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
		<li><?= $this->Html->link(__('Edit Event', true), ['action' => 'edit', $event->id], ['class' => 'action-bar-before']); ?> </li>
		<li><?= $this->Html->link(__('Delete Event', true), ['action' => 'delete', $event->id], ['class' => 'action-bar-before'], [], sprintf(__('Are you sure you want to delete this %s event?', true), $event->event_type->name)); ?> </li>
		<li><?= $this->Html->link(__('Manage Events', true), ['action' => 'index'], ['class' => 'action-bar-before']); ?> </li>
		<li><?= $this->Html->link(__('Manage Event Types', true), ['controller' => 'event_types', 'action' => 'index'], ['class' => 'action-bar-before']) ?></li>
		<li><?= $this->Html->link(__('Add an Event', true), ['action' => 'add'], ['class' => 'action-bar-before']); ?></li>
		<li><?= $this->Html->link(__('View Calendar', true), ['controller' => 'full_calendar'], ['class' => 'action-bar-before']); ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
	<div style="margin-top: 0px; padding-bottom: 0px;">
	<h2 style="display: inline-block;"><?= __('Event'); ?> - </h2>
	<h1 style="display: inline-block;"><?= $event->title; ?></h1>
	</div>

	<h3><?= $event->start->format('F jS @ g:ia'); ?> - <?= $event->end->format('g:ia'); ?></h3>
	<div>
	<p style="display: inline-block;">
		<span><?= __('EVENT DETAILS: '); ?></span>
	</p>
	<p style="display: inline-block;">
		<?= $event->details; ?>
	</p>
	</div>
	<p>
		<span><?= __('DATE: '); ?></span>
		<?= $event->start->format('l, F jS'); ?>
	</p>
	<p>
		<span><?= __('TIME: '); ?></span>
		<?php if($event->all_day != 1): ?>
			<?= $event->start->format('g:ia'); ?> - <?= $event->end->format('g:ia'); ?>
		<?php else: ?>
			<?= "N/A"; ?>
		<?php endif; ?> 
	</p>
</section>
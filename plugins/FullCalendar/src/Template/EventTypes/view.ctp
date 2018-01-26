<?php
/*
 * Template/EventTypes/view.ctp
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
          <h3 style="margin: 20px 0px 0px 25px">Event Types</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
		<li><?= $this->Html->link(__('Add an Event Type', true), ['action' => 'add'], ['class' => 'action-bar-before']); ?></li>
		<li><?= $this->Html->link(__('Edit Event Type', true), ['action' => 'edit', $eventType->id], ['class' => 'action-bar-before']); ?> </li>
		<li><?= $this->Html->link(__('Delete Event Type', true), ['action' => 'delete', $eventType->id], ['class' => 'action-bar-before'], [], sprintf(__('Are you sure you want to delete %s?', true), $eventType->name)); ?> </li>
		<li><?= $this->Html->link(__('Manage Event Types', true), ['action' => 'index'], ['class' => 'action-bar-before']); ?> </li>
		<li><?= $this->Html->link(__('Manage Events', true), ['controller' => 'events', 'action' => 'index'], ['class' => 'action-bar-before']); ?></li>
		<li><?= $this->Html->link(__('View Calendar', true), ['controller' => 'full_calendar'], ['class' => 'action-bar-before']); ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
<div class="eventTypes small-12 medium-8 large-9 columns">
	<h2><?= __('Event Type');?></h2>
	<p>
		<span><?= __('Name') ?>: </span>
		<?= $eventType->name; ?>
	</p>
	<p>
		<span><?= __('Color') ?>: </span>
		<?= $eventType->color; ?>
	</p>
</div>
<div class="divider"></div>
<div class="related small-12">
	<?php if (!empty($eventType->events)):?>
	<h3><?= __('Related Events');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?= __('Title'); ?></th>
		<th><?= __('Status'); ?></th>
		<th><?= __('Start'); ?></th>
        <th><?= __('End'); ?></th>
        <th><?= __('All Day'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		foreach ($eventType->events as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?= $class;?>>
			<td><?= $event->title;?></td>
			<td><?= $event->status;?></td>
			<td><?= $event->start;?></td>
            <td><?php if($event->all_day != 1) { echo $event['end']; } else { echo "N/A"; } ?></td>
            <td><?php if($event->all_day == 1) { echo "Yes"; } else { echo "No"; }?></td>
			<td><?= $event['modified'];?></td>
			<td class="actions">
				<?= $this->Html->link(__('View', true), ['controller' => 'events', 'action' => 'view', $event->id]); ?>
				<?= $this->Html->link(__('Edit', true), ['controller' => 'events', 'action' => 'edit', $event->id]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</section>
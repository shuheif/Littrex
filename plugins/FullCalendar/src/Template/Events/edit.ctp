<?php
/*
 * Template/Events/edit.ctp
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
          <h3 style="margin: 20px 0px 0px 25px">Edit Event</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
			<li><?= $this->Html->link(__('View Event', true), ['action' => 'view', $event->id], ['class' => 'action-bar-before']); ?></li>
		<li><?= $this->Html->link(__('Manage Events', true), ['action' => 'index'], ['class' => 'action-bar-before']);?></li>
		<li><?= $this->Html->link(__('Manage Event Types', true), ['controller' => 'event_types', 'action' => 'index'], ['class' => 'action-bar-before']);?></li>
		<li><?= $this->Html->link(__('Add an Event', true), ['action' => 'add'], ['class' => 'action-bar-before']); ?></li>
		<li><li><?= $this->Html->link(__('View Calendar', true), ['controller' => 'full_calendar'], ['class' => 'action-bar-before']); ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
	<?= $this->Form->create($event, ['type' => 'file']);?>
		<fieldset>
	 		<legend><?= __('Edit Event'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('event_type_id');
			echo $this->Form->input('title');
			echo $this->Form->input('details');
			echo $this->Form->input('start', ['interval' => 15, 'timeFormat' => 12]);
			echo $this->Form->input('end', ['interval' => 15, 'timeFormat' => 12]);
			echo $this->Form->input('all_day');
			echo $this->Form->input('status', ['options' => [
						'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
						'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
						]
					]
				);
		?>
		</fieldset>
	<?= $this->Form->button(__('Submit', true));?>
	<?= $this->Form->end(); ?>
</section>
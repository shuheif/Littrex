<?php
/*
 * Template/EventTypes/add.ctp
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
		<li><?= $this->Html->link(__('Manage Event Types', true), ['action' => 'index'], ['class' => 'action-bar-before']);?></li>
		<li><?= $this->Html->link(__('Manage Events', true), ['controller' => 'events', 'action' => 'index'], ['class' => 'action-bar-before']); ?></li>
		<li><?= $this->Html->link(__('View Calendar', true), ['controller' => 'full_calendar'], ['class' => 'action-bar-before']); ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
<div class="float-none form small-12 medium-8 large-9 columns">
	<?= $this->Form->create($eventType);?>
		<fieldset>
	 		<legend><?= __('Add Event Type'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('color', 
						['options' => [
							'Blue' => 'Blue',
							'Red' => 'Red',
							'Pink' => 'Pink',
							'Purple' => 'Purple',
							'Orange' => 'Orange',
							'Green' => 'Green',
							'Gray' => 'Gray',
							'Black' => 'Black',
							'Brown' => 'Brown'
						]]);
	
		?>
		</fieldset>
	<?= $this->Form->button(__('Submit', true));?>
	<?= $this->Form->end(); ?>
</div>
</section>
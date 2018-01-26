<?php
/*
 * Template/EventTypes/index.ctp
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
			<li><?= $this->Html->link(__('Manage Events', true), ['controller' => 'events', 'action' => 'index'], ['class' => 'action-bar-before']); ?></li>
	        <li><?= $this->Html->link(__('View Calendar', true), ['controller' => 'full_calendar'], ['class' => 'action-bar-before']); ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-lg-8" style="float:none; margin: 0 auto;">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name');?></th>
	            	<th><?= $this->Paginator->sort('color');?></th>
					<th class="actions"></th>
                </tr>
                </thead>
                    <tbody>
                    	<?php
		$i = 0;
		foreach ($eventTypes as $eventType):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
	?>
		<tr<?= $class;?>>
			<td><?= $eventType->name; ?></td>
	        <td><?= $eventType->color; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View', true), ['action' => 'view', $eventType->id]); ?>
				<?= $this->Html->link(__('Edit', true), ['action' => 'edit', $eventType->id]); ?>
				<?= $this->Form->postLink('Delete', ['action' => 'delete', $eventType->id], ['confirm' => 'Are you sure?']); ?>
			</td>
		</tr>
		<?php endforeach; ?>
                	</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php $this->end(); ?>
<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">
          Grades - 
          <?php
                $title = h($course->department) . $this->Number->format($course->number) . " " . ($course->title);
                echo $title;
          ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php if ($auth->user('id') == $course->teacher_id): ?>
            <li><?= $this->Html->link(__('Add Grades'), ['action' => 'add', $course->id], ['class' => 'action-bar-before']) ?></li>
            <?php endif; ?>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 25px;">
        <div class="col-md-6 col-xs-12 col-sm-12">
          <div id="chart1div" style="height: 400px; background-color: #FFFFFF;" ></div>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-12">
          <div id="chart2div" style="height: 400px; background-color: #FFFFFF;" ></div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($grades as $grade): ?>
                    <tr>
                        <td><?= h($grade->title) ?></td>
                        <td><?= h($grade->description) ?></td>
                        <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $grade->id]) ?>
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
echo $this->Html->script('https://www.amcharts.com/lib/3/amcharts.js');
echo $this->Html->script('https://www.amcharts.com/lib/3/serial.js');
echo $this->Html->script('https://www.amcharts.com/lib/3/pie.js');
echo $this->Html->script('https://www.amcharts.com/lib/3/themes/light.js');
?>

<?php $this->start('scriptBotton'); ?>
    <script type="text/javascript">
      AmCharts.makeChart("chart1div",
        {
          "type": "pie",
          "angle": 12,
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "depth3D": 15,
          "titleField": "category",
          "valueField": "column-1",
          "theme": "light",
          "allLabels": [],
          "balloon": {},
          "legend": {
            "enabled": true,
            "align": "center",
            "markerType": "circle"
          },
          "titles": [{
              "text": "Student Grade Percentage in Class"
            }
            ],
          "dataProvider": [
            {
              "category": "A",
              "column-1": 86
            },
            {
              "category": "B",
              "column-1": 91
            },
            {
              "category": "C",
              "column-1": 80
            },
            {
              "category": "D",
              "column-1": 27
            },
            {
              "category": "F",
              "column-1": 64
            }
          ]
        }
      );
    </script>
    <script type="text/javascript">
      AmCharts.makeChart("chart2div",
        {
          "type": "serial",
          "categoryField": "category",
          "angle": 30,
          "depth3D": 30,
          "startDuration": 1,
          "theme": "light",
          "categoryAxis": {
            "gridPosition": "start"
          },
          "trendLines": [],
          "graphs": [
            {
              "balloonText": "[[title]] of [[category]]:[[value]]",
              "fillAlphas": 1,
              "id": "AmGraph-1",
              "title": "Last Month",
              "type": "column",
              "valueField": "Last Month"
            },
            {
              "balloonText": "[[title]] of [[category]]:[[value]]",
              "fillAlphas": 1,
              "id": "AmGraph-2",
              "title": "This Month",
              "type": "column",
              "valueField": "This Month"
            }
          ],
          "guides": [],
          "valueAxes": [
            {
              "id": "ValueAxis-1",
              "stackType": "3d",
              "title": "Percentage"
            }
          ],
          "allLabels": [],
          "balloon": {},
          "legend": {
            "enabled": true,
            "useGraphSettings": true
          },
          "titles": [
            {
              "id": "Title-1",
              "size": 15,
              "text": "Grade Comparison to Last Month"
            }
          ],
          "dataProvider": [
            {
              "category": "A",
              "Last Month": "35",
              "This Month": "56"
            },
            {
              "category": "B",
              "Last Month": "35",
              "This Month": "70"
            },
            {
              "category": "C",
              "Last Month": "80",
              "This Month": "70"
            },
            {
              "category": "D",
              "Last Month": "25",
              "This Month": "35"
            },
            {
              "category": "F",
              "Last Month": "10",
              "This Month": "5"
            }
          ]
        }
      );
    </script>
<?php $this->end(); ?>


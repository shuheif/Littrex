<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Attendances</h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), 
                ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
                <?php if($auth->user('role') == 1 || $auth->user('role') == 2) : ?>
            <li><?= $this->Html->link(__('Add attendance'), ['action' => 'add', $course->id], ['class' => 'action-bar-before']) ?></li>
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
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($classevents as $classevent): ?>
                <tr>
                    <td><?= h($classevent->title) ?></td>
                    <td><?= h($classevent->date) ?></td>
                    <td><li style="list-style: none;"><?= $this->Html->link(__('View'), ['action' => 'view', $classevent->id]) ?></li></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
          </section>

<?php
echo $this->Html->script('https://www.amcharts.com/lib/3/amcharts.js');
echo $this->Html->script('https://www.amcharts.com/lib/3/serial.js');
echo $this->Html->script('https://www.amcharts.com/lib/3/themes/light.js');
?>

<?php $this->start('scriptBotton'); ?>
    <script type="text/javascript">
      AmCharts.makeChart("chart1div",
        {
          "type": "serial",
          "categoryField": "date",
          "dataDateFormat": "YYYY-MM-DD",
          "theme": "light",
          "categoryAxis": {
            "parseDates": true
          },
          "chartCursor": {
            "enabled": true
          },
          "chartScrollbar": {
            "enabled": true
          },
          "trendLines": [],
          "graphs": [
            {
              "bullet": "round",
              "id": "AmGraph-1",
              "title": "Attendance",
              "valueField": "column-1"
            }
          ],
          "guides": [],
          "valueAxes": [
            {
              "id": "ValueAxis-1",
              "title": "Number of Students"
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
              "text": "Attendance Per Day"
            }
          ],
          "dataProvider": [
            {
              "date": "2014-03-01",
              "column-1": "20"
            },
            {
              "date": "2014-03-02",
              "column-1": "18"
            },
            {
              "date": "2014-03-03",
              "column-1": "19"
            },
            {
              "date": "2014-03-04",
              "column-1": "16"
            },
            {
              "date": "2014-03-05",
              "column-1": "13"
            },
            {
              "date": "2014-03-06",
              "column-1": "19"
            },
            {
              "date": "2014-03-07",
              "column-1": "10"
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
          "rotate": true,
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
              "title": "This Week",
              "type": "column",
              "valueField": "column-1"
            },
            {
              "balloonText": "[[title]] of [[category]]:[[value]]",
              "fillAlphas": 1,
              "id": "AmGraph-2",
              "title": "Last Week",
              "type": "column",
              "valueField": "column-2"
            }
          ],
          "guides": [],
          "valueAxes": [
            {
              "id": "ValueAxis-1",
              "stackType": "3d",
              "title": ""
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
              "text": "Attendance Comparison"
            }
          ],
          "dataProvider": [
            {
              "category": "Mon",
              "column-1": "17",
              "column-2": "20"
            },
            {
              "category": "Tues",
              "column-1": "13",
              "column-2": "19"
            },
            {
              "category": "Wed",
              "column-1": "14",
              "column-2": "17"
            },
            {
              "category": "Thurs",
              "column-1": "18",
              "column-2": "20"
            },
            {
              "category": "Fri",
              "column-1": "10",
              "column-2": "12"
            },
            {
              "category": "Sat",
              "column-1": "15",
              "column-2": "17"
            },
            {
              "category": "Sun",
              "column-1": "20",
              "column-2": "19"
            }
          ]
        }
      );
    </script>
<?php $this->end(); ?>

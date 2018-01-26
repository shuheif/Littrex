<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Attendances - <?= h($user->first_name . ' ' . $user->last_name) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
               <li><?= $this->Html->link(__('Profile'), ['action' => 'view', $user->id], 
                    ['class' => 'action-bar-before']) ?></li>
              <li><?= $this->Html->link(__('Grades'), ['action' => 'viewGrades', $user->id]) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

<section class="content" style="padding-top: 0px;">     
<div class="container">
      <div class="row" style="margin-bottom: 25px;">
        <div class="col-md-6 col-xs-12 col-sm-12">
          <div id="chart1div" style="height: 400px; background-color: #FFFFFF;" ></div>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-12">
          <div id="chart2div" style="height: 400px; background-color: #FFFFFF;" ></div>
        </div>
      </div>
<?php foreach($courses as $course): ?>
    <h4><?= $this->Html->link(h($course->department . $this->Number->format($course->number) . ' ' . $course->title),
        ['controller' => 'Courses', 'action' => 'view', $course->id]) ?></h4>
    <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th scope="col"><?= __('Class') ?></th>
                <th scope="col"><?= __('Attendance') ?></th>
                <th scope="col"><?= __('Memo') ?></th>
                <?php if($auth->user('role') == 1): ?>
                <th scope="col"><?= __('Action') ?></th>
                <?php endif; ?>
                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($classevents[$course->id] as $classevent): ?>
                    <tr>
                        <td><?= h($classevent->title) ?></td>
                        <?php 
                $attended = false;
                foreach($attendances as $attendance) {
                    if($attendance->classevent_id == $classevent->id) {
                        echo "<td>";
                        echo h($attendance->attendance);
                        echo "</td><td>";
                        echo h($attendance->memo);
                        echo "</td><td><li>";
                        echo $this->Html->link('Late Register', ['controller' => 'Attendances', 'action' => 'edit', $attendance->id]);
                        echo "</li></td>";
                        $attended = true;
                        break;
                    }
                }
                if (!$attended) {
                    echo "<td>No Data</td>
                         <td>No Data</td><td></td>";
                } ?>
                </td>
                </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<?php endforeach; ?>
</div>

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

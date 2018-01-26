<?php

$sender = $notification->sender;
debug($notification);
switch ($notification->type) {
            case 1: // Teacher posted a new announcements on Course
                    // Link to Courses/view/#
                $course = $this->Courses->get($notification->variable1);
                echo $this->Html->link(h($sender->first_name . ' ' . $sender->last_name . ' posted a new announcement on ' . $notification->title . '.'),
                            ['controller' => 'Courses', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            case 2: // Teacher edited an announcements on Course
                    // Link to Courses/view/#
                $course = $this->Courses->get($notification->variable1);
                echo $this->Html->link(h($sender->first_name . ' ' . $sender->last_name . ' edited an announcement on ' . $notification->title . '.'),
                            ['controller' => 'Courses', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            case 3: // Teacher added a new assignment: Assignment
                    // Link to Assignments/view/#
                echo $this->Html->link(h($sender->first_name . ' ' . $sender->last_name . ' added a new assignment.'),
                            ['controller' => 'Assignments', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            case 4: // Teacher graded your assignment: Assignment
                    // Link to Results/view/#
                echo $this->Html->link(h($sender->first_name . ' ' . $sender->last_name . ' graded your assignment.'),
                            ['controller' => 'Results', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            case 5: // Student submitted assignment: Assignment
                    // Link to Submissions/view/#
                echo $this->Html->link(h($sender->first_name . ' ' . $sender->last_name . ' graded your assignment.'),
                            ['controller' => 'Submissions', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            case 6: // School posted a new information
                    // Link to Informations/schoolInfo/
                echo $this->Html->link("A new school information is posted.",
                            ['controller' => 'Informations', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            case 7: // Government posted a new information
                    // Link to Informations/governmentInfo/
                echo $this->Html->link("A new government information is posted.", 
                            ['controller' => 'Informations', 'action' => 'view', $notification->variable1],
                            ['class' => 'fa fa-users text-aqua']); 
                break;

            default: 
                break;
        }
?>

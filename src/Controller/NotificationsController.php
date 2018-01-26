<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 */
class NotificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
        $Messages = TableRegistry::get('Messages');
        $messages = $Messages->find('all')->where(['receiver_id' => $this->Auth->user('id')])
        ->contain(['Notifications']);
        foreach($messages as $message) {
            $notifications[] = $this->notificationString($message->notification);
        }

        $this->set(compact('notifications'));
        $this->set('_serialize', ['notifications']);
    }

    private function notificationString($notification)
    {
        $Users = TableRegistry::get('Users');
        $sender = $Users->get($notification->sender_id);
        switch ($notification->type) {
            case 1: // Teacher posted a new announcements on Course
                    // Link to Courses/view/#
            $Courses = TableRegistry::get('Courses');
            $course = $Courses->get($notification->variable1);
            return  ['title' => h($sender->first_name . ' ' . $sender->last_name . ' posted a new announcement on ' . $course->title . '.'),
            'controller' => 'Courses',
            'action' => 'view',
            'variable1' => $notification->variable1];
            break;

            case 2: // Teacher edited an announcements on Course
                    // Link to Courses/view/#
            $Courses = TableRegistry::get('Courses');
            $course = $Courses->get($notification->variable1);
            return ['title' => h($sender->first_name . ' ' . $sender->last_name . ' edited an announcement on ' . $course->title . '.'),
            'controller' => 'Courses', 
            'action' => 'view', 
            'variable1' => $notification->variable1];
            break;

            case 3: // Teacher added a new assignment: Assignment
                    // Link to Assignments/view/#
            return ['title' => h($sender->first_name . ' ' . $sender->last_name . ' added a new assignment.'),
            'controller' => 'Assignments',
            'action' => 'view', 
            'variable1' => $notification->variable1];
            break;

            case 4: // Teacher graded your assignment: Assignment
                    // Link to Results/view/#
            return ['title' => h($sender->first_name . ' ' . $sender->last_name . ' graded your assignment.'),
            'controller' => 'Results', 
            'action' => 'view', 
            'variable1' => $notification->variable1];
            break;

            case 5: // Student submitted assignment: Assignment
                    // Link to Submissions/view/#
            return ['title' => h($sender->first_name . ' ' . $sender->last_name . ' graded your assignment.'),
            'controller' => 'Submissions', 
            'action' => 'view', 
            'variable1' => $notification->variable1];
            break;

            case 6: // School posted a new information
                    // Link to Informations/schoolInfo/
            return ['title' => "A new school information is posted.",
            'controller' => 'Informations', 
            'action' => 'view', 
            'variable1' => $notification->variable1];
            break;

            case 7: // Government posted a new information
                    // Link to Informations/governmentInfo/
            return ['title' => "A new government information is posted.", 
            'controller' => 'Informations', 
            'action' => 'view', 
            'variable1' => $notification->variable1];
            break;

            default: 
            debug("default");
            return "";
            break;
        }
    }


}

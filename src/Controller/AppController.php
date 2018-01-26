<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $this->viewBuilder()->theme('AdminLTE');

        $this->viewBuilder()->Layout('custom');
        
        $this->set('theme', Configure::read('Theme'));
    }
    
    public function beforeFilter(Event $event)
    {
	    parent::beforeFilter($event);
        $this->set('auth', $this->Auth);
        
        $images = TableRegistry::get('Images');
        $profile_image = $this->Auth->user('image_id') ? $images->get($this->Auth->user('image_id')) : '';

        $Courses = TableRegistry::get('Courses');
        $courses = $Courses->find('withUser', ['user_id' => $this->Auth->user('id')]);

        $Messages = TableRegistry::get('Messages');
        $messages = $Messages->find('all')->where(['receiver_id' => $this->Auth->user('id')])
                            ->contain(['Notifications']);
        foreach($messages as $message) {
            $notifications[] = $this->notificationString($message->notification);
        }
        
        $this->set(compact('profile_image', 'courses', 'notifications'));
        $this->set('_serialize', ['profile_image', 'courses', 'notifications']);

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

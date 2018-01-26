<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 */
class AssignmentsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignment = $this->Assignments->get($id);
        $course = $this->Assignments->Courses->get($assignment->course_id);
        $submissions = $this->Assignments->Submissions->find('withAssignments', ['assignment_id' => $id])->contain('Users');
        $members = $this->Assignments->Submissions->Users->find('withCourse', ['course_id' => $assignment->course_id]);

        $this->set(compact('assignment', 'submissions', 'members', 'course'));
        $this->set('_serialize', ['assignment', 'submissions', 'members', 'course']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($course_id)
    {
        //Only the teacher can access here
        $course = $this->Assignments->Courses->get($course_id);
        if($course->teacher_id != $this->Auth->user('id')) {
            $this->Flash->error(__('You are not allowed to access this page.'));
            return $this->redirect(['action' => 'courseAssignments', $course_id]);
        }

        $assignment = $this->Assignments->newEntity();
                if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->data);
            
            $grade = $this->Assignments->Grades->newEntity();
            $grade->course_id = $course_id;
            $grade->title = $assignment->title;
            $grade->description = $assignment->description;
            if ($this->Assignments->Grades->save($grade)) {
                $assignment->grade = $grade;
            if ($this->Assignments->save($assignment)) {
                $this->createAssignmentNotification($assignment);
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'courseAssignments', $course_id]);
            }
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $this->set(compact('assignment', 'course'));
        $this->set('_serialize', ['assignment', 'course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignment = $this->Assignments->get($id);

        //Only the teacher can access here
        $course = $this->Assignments->Courses->get($assignment->course_id);
        if($course->teacher_id != $this->Auth->user('id')) {
            $this->Flash->error(__('You are not allowed to access this page.'));
            return $this->redirect(['action' => 'courseAssignments', $course_id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->data);
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $this->set(compact('assignment'));
        $this->set('_serialize', ['assignment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $assignment = $this->Assignments->get($id);
        //Only the teacher can access here
        $course = $this->Assignments->Courses->get($assignment->course_id);
        if($course->teacher_id != $this->Auth->user('id')) {
            $this->Flash->error(__('You are not allowed to access this page.'));
            return $this->redirect(['action' => 'courseAssignments', $course_id]);
        }
         
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'courseAssignments', $course->id]);
    }

    public function courseAssignments($course_id)
    {
        //Only admin and course members can access.
        if ($this->Auth->user('role') != 1 && !$this->isMember($course_id, $this->Auth->user('id'))) {
             $this->Flash->error(__('You are not allowed to access this page.'));
            return $this->redirect(['controller' => 'Courses', 'action' => 'view', $course_id]);
        }

        $assignments = $this->paginate($this->Assignments->find('withCourse', ['course_id' => $course_id]));
        $course = $this->Assignments->Courses->get($course_id);
        
        $this->set(compact('assignments', 'course'));
        $this->set('_serialize', ['assignments', 'course']);
    }

    private function createAssignmentNotification($assignment)
    {
        $Notifications = TableRegistry::get('Notifications');
        // Create notification and messages to all members.
        $notification = $Notifications->newEntity();
        $notification->type = 3;// Added assignment
        $notification->variable1 = $assignment->id;
        $notification->date = date("Y-m-d H:i:s");
        $notification->sender_id = $this->Auth->user('id');
                
        if ($Notifications->save($notification)) {
            $Messages = TableRegistry::get('Messages');
            $members = $this->Assignments->Courses->Users->find('withCourse', ['course_id' => $assignment->course_id]);
            foreach($members as $member) {
                $message = $Messages->newEntity();
                $message->notification_id = $notification->id;
                $message->receiver_id = $member->id;
                $message->isRead = 0;
                $Messages->save($message);
            }
        }
    }

    private function isMember($course_id, $user_id)
    {
        $query = $this->Assignments->Courses->CoursesUsers->find('all')
            ->where(['course_id' => $course_id, 'user_id' => $user_id]);
        if ($query->count() >= 1) {
            return true;
        } else {
            return false;
        }
    }
}

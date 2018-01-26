<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Results Controller
 *
 * @property \App\Model\Table\ResultsTable $Results
 */
class ResultsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => ['Users']
        ]);
        $grade = $this->Results->Grades->get($result->grade_id);
        $course = $this->Results->Grades->Courses->get($grade->course_id);

        $this->set(compact('result', 'grade', 'course'));
        $this->set('_serialize', ['result', 'grade', 'course']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($grade_id, $user_id)
    {
        $result = $this->Results->newEntity();
        $grade = $this->Results->Grades->get($grade_id);
        $course = $this->Results->Grades->Courses->get($grade->course_id);
        $user = $this->Results->Users->get($user_id);
        if ($this->request->is('post')) {
            $result = $this->Results->patchEntity($result, $this->request->data);
            $result->grade_id = $grade_id;
            $result->user_id = $user_id;
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));
                $this->createResultNotification($result);

                return $this->redirect(['controller' => 'Grades', 'action' => 'view', $grade_id]);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $this->set(compact('result', 'user', 'grade', 'course'));
        $this->set('_serialize', ['result', 'user', 'grade', 'course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Result id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $result = $this->Results->patchEntity($result, $this->request->data);
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $users = $this->Results->Users->find('list', ['limit' => 200]);
        $grades = $this->Results->Grades->find('list', ['limit' => 200]);
        $this->set(compact('result', 'users', 'grades'));
        $this->set('_serialize', ['result']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $result = $this->Results->get($id);
        if ($this->Results->delete($result)) {
            $this->Flash->success(__('The result has been deleted.'));
        } else {
            $this->Flash->error(__('The result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function createResultNotification($result)
    {
        $Notifications = TableRegistry::get('Notifications');
        // Create notification and messages to all members.
        $notification = $Notifications->newEntity();
        $notification->type = 4;
        $notification->variable1 = $result->id;
        $notification->date = date("Y-m-d H:i:s");
        $notification->sender_id = $this->Auth->user('id');
                
        if ($Notifications->save($notification)) {
            $Messages = TableRegistry::get('Messages');
            
            $message = $Messages->newEntity();
            $message->notification_id = $notification->id;
            $message->receiver_id = $result->user_id; // Only the student gets a notification.
            $message->isRead = 0;
            $Messages->save($message);
        }
    }

    public function studentView($course_id, $user_id)
    {
        $grades = $this->Results->Grades->find('withCourse', ['course_id' => $course_id]);
        $course = $this->Results->Grades->Courses->get($course_id);
        $user = $this->Results->Users->get($user_id);
        $results = $this->Results->find('withUser', ['user_id' => $user_id]);
        
        $this->set(compact('grades', 'results', 'course', 'user'));
        $this->set('_serialize', ['grades', 'results', 'course', 'user']);
    }

}

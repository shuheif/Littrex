<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

/**
 * Submissions Controller
 *
 * @property \App\Model\Table\SubmissionsTable $Submissions
 */
class SubmissionsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submission = $this->Submissions->get($id, [
            'contain' => ['Users', 'Results', 'Attachments']
            ]);
        $assignment = $this->Submissions->Assignments->get($submission->assignment_id);
        $course = $this->Submissions->Assignments->Courses->get($assignment->course_id);

        $this->set(compact('submission', 'assignment', 'course'));
        $this->set('_serialize', ['submission', 'assignment', 'course']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($assignment_id)
    {
        $submission = $this->Submissions->newEntity();
        $assignment = $this->Submissions->Assignments->get($assignment_id);
        $course = $this->Submissions->Assignments->Courses->get($assignment->course_id);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['attachment']['size'] == 0) {
                $data['attachment'] = null;
            }
            $submission = $this->Submissions->patchEntity($submission, $this->request->data);
            $submission->assignment_id = $assignment_id;
            $submission->submit_date = date("Y-m-d H:i:s");

            if ($data['attachment']['size'] > 0 && $data['attachment']['error'] == 0) {
                $filename = Text::uuid() . $data['attachment']['name'];
                $filepath = 'attachments/user_attachments/';
                $submission->attachment->filename = $filename;
                $submission->attachment->filepath = $filepath;
                $submission->attachment->title = $data['attachment']['name'];
                if (!move_uploaded_file($data['attachment']['tmp_name'], WWW_ROOT . $filepath . $filename)) {
                    $this->Flash->error(__('The attchment file could not be saved. Please, try again.'));
                }
            }
            if ($this->Submissions->save($submission)) {
                $this->createSubmissionNotification($submission);
                $this->Flash->success(__('The submission has been saved.'));
                
                return $this->redirect(['controller' => 'Assignments', 'action' => 'courseAssignments', $assignment->course_id]);
            }
            $this->Flash->error(__('The submission could not be saved. Please, try again.'));
        }

        $this->set(compact('submission', 'assignment', 'course'));
        $this->set('_serialize', ['submission', 'assignment', 'course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submission = $this->Submissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submission = $this->Submissions->patchEntity($submission, $this->request->data);
            if ($this->Submissions->save($submission)) {
                $this->Flash->success(__('The submission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submission could not be saved. Please, try again.'));
        }
        $assignments = $this->Submissions->Assignments->find('list', ['limit' => 200]);
        $users = $this->Submissions->Users->find('list', ['limit' => 200]);
        $grades = $this->Submissions->Grades->find('list', ['limit' => 200]);
        $attachments = $this->Submissions->Attachments->find('list', ['limit' => 200]);
        $this->set(compact('submission', 'assignments', 'users', 'grades', 'attachments'));
        $this->set('_serialize', ['submission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submission = $this->Submissions->get($id);
        if ($this->Submissions->delete($submission)) {
            $this->Flash->success(__('The submission has been deleted.'));
        } else {
            $this->Flash->error(__('The submission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function createSubmissionNotification($submission)
    {
        $Notifications = TableRegistry::get('Notifications');
        // Create notification and messages to all members.
        $notification = $Notifications->newEntity();
        $notification->type = 5;
        $notification->variable1 = $submission->id;
        $notification->date = date("Y-m-d H:i:s");
        $notification->sender_id = $this->Auth->user('id');
                
        if ($Notifications->save($notification)) {
            $Messages = TableRegistry::get('Messages');
            $assignment = $this->Submissions->Assignments->get($submission->id);
            $course = $this->Submissions->Assignments->Courses->get($assignment->course_id);
            $teacher = $this->Submissions->Users->get($course->id);
            $message = $Messages->newEntity();
            $message->notification_id = $notification->id;
            $message->receiver_id = $teacher->id; // Only the teacher gets the notification.
            $message->isRead = 0;
            $Messages->save($message);
        }
    }
}

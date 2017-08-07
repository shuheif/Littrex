<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Submissions Controller
 *
 * @property \App\Model\Table\SubmissionsTable $Submissions
 */
class SubmissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assignments', 'Users', 'Grades', 'Attachments']
        ];
        $submissions = $this->paginate($this->Submissions);

        $this->set(compact('submissions'));
        $this->set('_serialize', ['submissions']);
    }

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
            'contain' => ['Assignments', 'Users', 'Grades', 'Attachments']
            ]);
        $assignment = $this->Submissions->Assignments->get($submission->assignment_id);

        $this->set(compact('submission', 'assignment'));
        $this->set('_serialize', ['submission', 'assignment']);
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

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $submission = $this->Submissions->patchEntity($submission, $this->request->data);
            $submission->submit_date = date("Y-m-d H:i:s");

            if ($data['attachment']['size'] > 0 && $data['attachment']['error'] == 0) {
                $filename = Text::uuid() . $data['attachment']['name'];
                $user->attachment->filename = $filename;
                $user->attachment->filepath = 'user_attachments';
                // WWW_ROOT /home/users/0/raindrop.jp-shuhei/web/shuhei_dev/webroot/
                if (!move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . 'attachments/user_attachments/' . $filename)) {
                    $this->Flash->error(__('The attchment file could not be saved. Please, try again.'));
                } else {
                    if ($this->Submissions->save($submission)) {
                        $this->Flash->success(__('The submission has been saved.'));
                
                        return $this->redirect(['controller' => 'Assignments', 'action' => 'courseAssignments', $assignment->course_id]);
                    }
                    $this->Flash->error(__('The submission could not be saved. Please, try again.'));
                }
            }
        }

        $this->set(compact('submission', 'assignment'));
        $this->set('_serialize', ['submission', 'assignment']);
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
}

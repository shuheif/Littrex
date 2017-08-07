<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 */
class AssignmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Grades', 'Attachments', 'Users', 'Courses']
        ];
        $assignments = $this->paginate($this->Assignments);

        $this->set(compact('assignments'));
        $this->set('_serialize', ['assignments']);
    }

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
        $submissions = $this->Assignments->Submissions->find('withAssignments', ['assignment_id' => $id])->contain('Users');
        $members = $this->Assignments->Submissions->Users->find('withCourse', ['course_id' => $assignment->course_id]);

        $this->set(compact('assignment', 'submissions', 'members'));
        $this->set('_serialize', ['assignment', 'submissions', 'members']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($course_id)
    {
        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->data);
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'courseAssignments', $course_id]);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        $this->set(compact('assignment'));
        $this->set('_serialize', ['assignment']);
        $this->set('course_id', $course_id);
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
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
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
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function courseAssignments($course_id)
    {
        $assignments = $this->paginate($this->Assignments->find('withCourse', ['course_id' => $course_id]));

        $this->set(compact('assignments'));
        $this->set('_serialize', ['assignments']);
        $this->set('course_id', $course_id);       
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Evaluations Controller
 *
 * @property \App\Model\Table\EvaluationsTable $Evaluations
 */
class EvaluationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Courses']
        ];
        $evaluations = $this->paginate($this->Evaluations);

        $this->set(compact('evaluations'));
        $this->set('_serialize', ['evaluations']);
    }

    /**
     * View method
     *
     * @param string|null $id Evaluation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evaluation = $this->Evaluations->get($id, [
            'contain' => ['Users', 'Courses']
        ]);

        $this->set('evaluation', $evaluation);
        $this->set('_serialize', ['evaluation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($course_id, $student_id)
    {
        $evaluation = $this->Evaluations->newEntity();
        $course = $this->Evaluations->Courses->get($course_id);

        if ($this->request->is('post')) {
            $evaluation = $this->Evaluations->patchEntity($evaluation, $this->request->data);
            $evaluation->course_id = $course_id;
            $evaluation->teacher_id = $course->teacher_id;
            $evaluation->student_id = $student_id;
            if ($this->Evaluations->save($evaluation)) {
                $this->Flash->success(__('The evaluation has been saved.'));

                return $this->redirect(['controller' => 'Courses', 'action' => 'view', $course->id]);
            }
            $this->Flash->error(__('The evaluation could not be saved. Please, try again.'));
        }
        $teacher = $this->Evaluations->Users->get($course->teacher_id);

        $this->set(compact('evaluation', 'teacher', 'course'));
        $this->set('_serialize', ['evaluation', 'teacher', 'course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evaluation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evaluation = $this->Evaluations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evaluation = $this->Evaluations->patchEntity($evaluation, $this->request->data);
            if ($this->Evaluations->save($evaluation)) {
                $this->Flash->success(__('The evaluation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evaluation could not be saved. Please, try again.'));
        }
        $users = $this->Evaluations->Users->find('list', ['limit' => 200]);
        $courses = $this->Evaluations->Courses->find('list', ['limit' => 200]);
        $this->set(compact('evaluation', 'users', 'courses'));
        $this->set('_serialize', ['evaluation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evaluation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evaluation = $this->Evaluations->get($id);
        if ($this->Evaluations->delete($evaluation)) {
            $this->Flash->success(__('The evaluation has been deleted.'));
        } else {
            $this->Flash->error(__('The evaluation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function courseEvaluations($course_id)
    {
        $course = $this->Evaluations->Courses->get($course_id);
        $evaluations = $this->Evaluations->find('all')->where(['course_id' => $course_id])->contain('Users');

        $this->set(compact('evaluations', 'course'));
        $this->set('_serialize', ['evaluations', 'course']);
    }
}

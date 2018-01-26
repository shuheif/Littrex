<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grades Controller
 *
 * @property \App\Model\Table\GradesTable $Grades
 */
class GradesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $grades = $this->paginate($this->Grades);

        $this->set(compact('grades'));
        $this->set('_serialize', ['grades']);
    }

    /**
     * View method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grade = $this->Grades->get($id);
        $course = $this->Grades->Courses->get($grade->course_id);
        $members = $this->Grades->Courses->Users->find('withCourse', ['course_id' => $course->id]);
        $results = $this->Grades->Results->find('withGrade', ['grade_id' => $id]);

        $this->set(compact('grade', 'course', 'members', 'results'));
        $this->set('_serialize', ['grade', 'course', 'members', 'results']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($course_id)
    {
        $grade = $this->Grades->newEntity();
        $course = $this->Grades->Courses->get($course_id);
        if ($this->request->is('post')) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            $grade->course = $course;
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['action' => 'courseGrades', $course_id]);
            }
            $this->Flash->error(__('The grade could not be saved. Please, try again.'));
        }
        $this->set(compact('grade', 'course'));
        $this->set('_serialize', ['grade', 'course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grade = $this->Grades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grade could not be saved. Please, try again.'));
        }
        $this->set(compact('grade'));
        $this->set('_serialize', ['grade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grade = $this->Grades->get($id);
        if ($this->Grades->delete($grade)) {
            $this->Flash->success(__('The grade has been deleted.'));
        } else {
            $this->Flash->error(__('The grade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function courseGrades($course_id)
    {
        $grades = $this->paginate($this->Grades->find('withCourse', ['course_id' => $course_id]));
        $course = $this->Grades->Courses->get($course_id);
        
        $this->set(compact('grades', 'course'));
        $this->set('_serialize', ['grades', 'course']);
    }

    
}

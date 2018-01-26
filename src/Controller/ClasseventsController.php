<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Classevents Controller
 *
 * @property \App\Model\Table\ClasseventsTable $Classevents
 */
class ClasseventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses']
        ];
        $classevents = $this->paginate($this->Classevents);

        $this->set(compact('classevents'));
        $this->set('_serialize', ['classevents']);
    }

    /**
     * View method
     *
     * @param string|null $id Classevent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classevent = $this->Classevents->get($id, [
            'contain' => ['Attendances']
        ]);
        $course = $this->Classevents->Courses->get($classevent->course_id);
        $members = $this->Classevents->Courses->Users->find('withCourse', ['course_id' => $course->id]);

        $this->set(compact('classevent', 'course', 'members'));
        $this->set('_serialize', ['classevent', 'course', 'members']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($course_id)
    {
        $classevent = $this->Classevents->newEntity();
        $course = $this->Classevents->Courses->get($course_id);

        if ($this->request->is('post')) {
            $classevent = $this->Classevents->patchEntity($classevent, $this->request->data);
            $classevent->course_id = $course_id;
            if ($this->Classevents->save($classevent)) {
                $this->Flash->success(__('The classevent has been saved.'));

                return $this->redirect(['action' => 'eventsWithCourse', $course_id]);
            }
            $this->Flash->error(__('The classevent could not be saved. Please, try again.'));
        }
        $this->set(compact('classevent', 'course'));
        $this->set('_serialize', ['classevent', 'course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Classevent id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classevent = $this->Classevents->get($id, [
            'contain' => []
        ]);
        $course = $this->Classevents->Courses->get($classevent->course_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classevent = $this->Classevents->patchEntity($classevent, $this->request->data);
            if ($this->Classevents->save($classevent)) {
                $this->Flash->success(__('The classevent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classevent could not be saved. Please, try again.'));
        }
        $this->set(compact('classevent', 'course'));
        $this->set('_serialize', ['classevent', 'course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Classevent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classevent = $this->Classevents->get($id);
        if ($this->Classevents->delete($classevent)) {
            $this->Flash->success(__('The classevent has been deleted.'));
        } else {
            $this->Flash->error(__('The classevent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function eventsWithCourse($course_id)
    {
        $classevents = $this->Classevents->find('withCourse', ['course_id' => $course_id]);
        $course = $this->Classevents->Courses->get($course_id);

        $this->set(compact('classevents', 'course'));
        $this->set('_serialize', ['classevents', 'course']);
    }
}

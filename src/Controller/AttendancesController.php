<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attendances Controller
 *
 * @property \App\Model\Table\AttendancesTable $Attendances
 */
class AttendancesController extends AppController
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
        $attendances = $this->paginate($this->Attendances);

        $this->set(compact('attendances'));
        $this->set('_serialize', ['attendances']);
    }

    /**
     * View method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendance = $this->Attendances->get($id, [
            'contain' => ['Users', 'Courses']
        ]);

        $this->set('attendance', $attendance);
        $this->set('_serialize', ['attendance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($classevent_id, $user_id)
    {
        $attendance = $this->Attendances->newEntity();
        if ($this->request->is('post')) {
            $attendance = $this->Attendances->patchEntity($attendance, $this->request->data);
            $attendance->classeevent_id = $classevent_id;
            $attendance->user_id = $user_id;
            if ($this->Attendances->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'view', $classevent_id]);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $this->set(compact('attendance', 'users', 'courses'));
        $this->set('_serialize', ['attendance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendance = $this->Attendances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendance = $this->Attendances->patchEntity($attendance, $this->request->data);
            if ($this->Attendances->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['controller' => 'Classevents', 'action' => 'view', $attendance->classevent_id]);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $this->set(compact('attendance'));
        $this->set('_serialize', ['attendance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendance = $this->Attendances->get($id);
        if ($this->Attendances->delete($attendance)) {
            $this->Flash->success(__('The attendance has been deleted.'));
        } else {
            $this->Flash->error(__('The attendance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Classevents', 'action' => 'view', $attendance->classevent_id]);
    }

    public function courseAttendances($course_id)
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $attendances = $this->paginate($this->Attendances->find('withCourse', ['course_id' => $course_id]));

        $this->set(compact('attendances'));
        $this->set('_serialize', ['attendances']);
        $this->set('course_id', $course_id);
    }

    public function addAttendance($classevent_id, $user_id)
    {
        $this->request->allowMethod(['post', 'addAttendance']);
        $attendance = $this->Attendances->newEntity();
        $attendance->classevent_id = $classevent_id;
        $attendance->user_id = $user_id;
        $attendance->attendance = "Attendance";
        if ($this->Attendances->save($attendance)) {
            $this->Flash->success(__('The attendance has been saved.'));
        } else {
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Classevents', 'action' => 'view', $classevent_id]);
    }

    public function addAbsent($classevent_id, $user_id)
    {
        $this->request->allowMethod(['post', 'addAbsent']);
        $attendance = $this->Attendances->newEntity();
        $attendance->classevent_id = $classevent_id;
        $attendance->user_id = $user_id;
        $attendance->attendance = "Absent";
        if ($this->Attendances->save($attendance)) {
            $this->Flash->success(__('The attendance has been saved.'));
        } else {
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Classevents', 'action' => 'view', $classevent_id]);
    }

    public function studentView($course_id, $user_id)
    {
        $classevents = $this->Attendances->Classevents->find('withCourse', ['course_id' => $course_id]);
        $course = $this->Attendances->Classevents->Courses->get($course_id);
        $user = $this->Attendances->Users->get($user_id);
        $attendances = $this->Attendances->find('withUser', ['user_id' => $user_id]);
        
        $this->set(compact('attendances', 'classevents', 'course', 'user'));
        $this->set('_serialize', ['attendances', 'classevents', 'course', 'user']);

    }
}

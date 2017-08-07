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
    public function add()
    {
        $attendance = $this->Attendances->newEntity();
        if ($this->request->is('post')) {
            $attendance = $this->Attendances->patchEntity($attendance, $this->request->data);
            if ($this->Attendances->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $users = $this->Attendances->Users->find('list', ['limit' => 200]);
        $courses = $this->Attendances->Courses->find('list', ['limit' => 200]);
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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $users = $this->Attendances->Users->find('list', ['limit' => 200]);
        $courses = $this->Attendances->Courses->find('list', ['limit' => 200]);
        $this->set(compact('attendance', 'users', 'courses'));
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

        return $this->redirect(['action' => 'index']);
    }

/*    public function userAttendances($course_id, $user_id)
    {
        $this->paginate = [
            'contain' => ['Users', 'Courses']
        ];
        $attendances = $this->paginate($this->Attendances);

        $this->set(compact('attendances'));
        $this->set('_serialize', ['attendances']);
    }*/

    /*public function addAttendances($course)
    {
        debug($course);
        $members = $course->Users->find('all');
        $attendances[];
        foreach($members as $member) {
            $attendance = $this->Attendances->newEntity();
            $attendance->user = $member;
            $attendances[] = $attendance;
        }

        if ($this->request->is('post')) {
            $attendance = $this->Attendances->patchEntity($attendance, $this->request->data);
            if ($this->Attendances->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $users = $this->Attendances->Users->find('list', ['limit' => 200]);
        $courses = $this->Attendances->Courses->find('list', ['limit' => 200]);
        $this->set(compact('attendance', 'users', 'courses'));
        $this->set('_serialize', ['attendance']);
}*/
    
    public function userAttendances($course_id, $user_id)
    {
        $this->paginate = [
            'contain' => ['Users', 'Courses']
        ];
        $attendances = $this->paginate($this->Attendances);

        $this->set(compact('attendances'));
        $this->set('_serialize', ['attendances']);
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

    public function addAttendances($course_id)
    {
        $members = $this->Attendances->Users->find('withCourse', ['course_id' => $course_id]);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            debug($data);
            $attendances = $this->Attendances->newEntities($data);
            foreach ($attendances as $attendace) {
                $this->Attendances->save($attendance);
            }
            $this->Flash->success(__('The attendances has been saved.'));
            return $this->redirect(['action' => 'courseAttendances', $course_id]);
        }

        $this->set(compact('members'));
        $this->set('_serialize', ['members']);
        $this->set('course_id', $course_id);
    }

}

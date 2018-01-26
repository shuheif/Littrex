<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('logout');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Images', 'Clubs', 'Courses']
        ]);
        $relatives = $this->Users->UsersUsers->find('all')->where(['child_id' => $user->id]);
        foreach($relatives as $relative) {
            $parents[] = $this->Users->get($relative->parent_id);
        }
        if ($user->role == 2) {
            //Get evaluations
            $evaluations = $this->Users->Evaluations->find('all')->where(['teacher_id' => $id]);
            $rate = 0;
            if ($evaluations->count() > 0) {
                $rate_total = 0;
                $student_num = 0;
                foreach($evaluations as $evaluation) {
                    $rate_total += $evaluation->rate;
                    $student_num++;
                }
                $rate = $rate_total / $student_num;
            }
            $this->set('rate', $rate);
        }

        $this->set(compact('user', 'relatives', 'parents'));
        $this->set('_serialize', ['user', 'relatives', 'parents']);
    }
    
    /**
     * Add method
     *
      @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to add users.'));
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $user = $this->Users->patchEntity($user, $data);
            $user->created_date = date("Y-m-d H:i:s");
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Auth->user('role') != 1 && $this->Auth->user('id') != $id) {
            $this->Flash->error(__('You are not allowed to edit this user.'));
            return $this->redirect(['action' => 'index']);
        }

        $user = $this->Users->get($id, ['contain' => ['Images']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $user = $this->Users->patchEntity($user, $data);
            if ($data['image']['size'] > 0 && $data['image']['error'] == 0) {
                $filename = Text::uuid() . $data['image']['name'];
                $user->image->filename = $filename;
                $user->image->filepath = 'user_images';
                if (!move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . 'img/user_images/' . $filename)) {
                    $this->Flash->error(__('The image could not be saved. Please, try again.'));
                }
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user profile has been saved.'));

                return $this->redirect(['action' => 'view', $user->id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to delete users.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function addRelative($parent_id, $child_id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to access this page.'));
            return $this->redirect(['action' => 'view', $parent_id]);
        }
        
        if ($this->request->is('post')) {
            $relationship = $this->Users->UsersUsers->newEntity();
            $relationship->parent_id = $parent_id;
            $relationship->child_id = $child_id;
                        
            if ($this->Users->UsersUsers->save($relationship)) {
                $relationship = $this->Users->UsersUsers->newEntity();
                $relationship->child_id = $child_id;
                $relationship->parent_id = $parent_id;

                if ($this->Users->UsersUsers->save($relationship)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'view', $child_id]);
                }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $parent = $this->Users->get($parent_id);
        $students = $this->Users->find('students');
        $this->set(compact('students', 'parent'));
        $this->set('_serialize', ['students', 'parent']);
    }

    public function login()
    {
        //$this->viewBuilder()->autoLayout(false);

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                //return $this->redirect($this->Auth->redirectUrl());
                switch ($this->Auth->user('role')) {
                    case 1: // Admin
                        return $this->redirect(['controller' => 'Users', 'action' => 'students']);
                    case 2: //Teacher
                        return $this->redirect(['controller' => 'Courses', 'action' => 'myCourses', $this->Auth->user('id')]);
                    case 3: // Student
                        return $this->redirect(['controller' => 'Courses', 'action' => 'myCourses', $this->Auth->user('id')]);
                    case 4: // Parent
                        return $this->redirect(['controller' => 'Users', 'action' => 'viewRelatives', $this->Auth->user('id')]);
                    case 5: // Government
                        return $this->redirect(['controller' => 'Schools', 'action' => 'index']);
                    case 6: // Staffs
                        return $this->redirect(['controller' => 'Users', 'action' => 'view', $this->Auth->user('id')]);
                    default: 
                        return $this->redirect(['controller' => 'Users', 'action' => 'view', $this->Auth->user('id')]);
                }
            }
        }
    }

    public function logout()
    {
        // Remove Notifications
        $Messages = TableRegistry::get('Messages');
        $messages = $Messages->find('all')->where(['receiver_id' => $this->Auth->user('id')]);
        debug($messages);
        foreach ($messages as $message) {
            if ($message->is_read >= 1) {
                $Messages->delete($message);
            } else {
                $message->is_read = $message->is_read + 1;
                $Messages->save($message);
            }
        }
            
        return $this->redirect($this->Auth->logout());
    }

    public function viewRelatives($user_id)
    {
        $relationships = $this->Users->UsersUsers->find('all')
            ->where(['parent_id' => $user_id]);
        if (empty($relationships)) {
            $children[] = null;
        } else {
            foreach($relationships as $relationship) {
                $children[] = $this->Users->get($relationship->child_id, ['contain' => 'Images']);
            }
        }
        $user = $this->Users->get($user_id);
        $this->set(compact('children', 'user'));
        $this->set('_serialize', ['children', 'user']);
    }

    public function viewGrades($user_id)
    {
        $user = $this->Users->get($user_id);
        $courses = $this->Users->Courses->find('withUser', ['user_id' => $user_id]);
        if (!empty($courses)) {        
            foreach ($courses as $course) {
                $grades[$course->id] = $this->Users->Courses->Grades->find('withCourse', ['course_id' => $course->id]);
            }
            $results = $this->Users->Courses->Grades->Results->find('withUser', ['user_id' => $user_id]);
        } else {
            $grades[] = null;
            $results = null;
        }
        $this->set(compact('user', 'courses', 'grades', 'results'));
        $this->set('_serialize', ['user', 'courses', 'grades', 'results']);
    }

    public function viewAttendances($user_id)
    {
        $user = $this->Users->get($user_id);
        $courses = $this->Users->Courses->find('withUser', ['user_id' => $user_id]);
        if (!empty($courses)) {        
            foreach ($courses as $course) {
                $classevents[$course->id] = $this->Users->Courses->Classevents->find('withCourse', ['course_id' => $course->id]);
            }
            $attendances = $this->Users->Courses->Classevents->Attendances->find('withUser', ['user_id' => $user_id]);
        } else {
            $classevents[] = null;
            $attendances = null;
        }
        $this->set(compact('user', 'courses', 'classevents', 'attendances'));
        $this->set('_serialize', ['user', 'courses', 'classevents', 'attendances']);
    }
   
    private function viewRole($role)
    {
        $this->paginate = [
            'contain' => ['Images']
        ];  
        $users = $this->paginate($this->Users->find('all')->where(['role' => $role]));
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

 
    public function staffs()
    {
        $this->paginate = [
            'contain' => ['Images']
        ];  
        $users = $this->paginate($this->Users->find('all')
            ->where(['role' => 1])->orWhere(['role' => 6]));
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

    }

    public function students()
    {
        $this->viewRole(3);
    }

    public function teachers()
    {
        $this->viewRole(2);
    }
}

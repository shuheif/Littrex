<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $courses = $this->paginate($this->Courses);

        $this->set(compact('courses'));
        $this->set('_serialize', ['courses']);
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Users']
        ]);
        $teacher = $this->Courses->Users->get($course->teacher_id);
        $topics = $this->Courses->Topics->find('withCourse', ['course_id' => $id, 'contain' => ['Attachments', 'Assignments']]);
    
        $this->set('course', $course);
        $this->set('teacher', $teacher);
        $this->set('topics', $topics);
        $this->set('_serialize', ['course']);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to add new courses.'));
            return $this->redirect(['action' => 'index']);
        }

        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $course = $this->Courses->patchEntity($course, $data);
            
            if ($this->Courses->save($course, ['associated' => ['Users']])) {
                $teacher = $this->Courses->Users->get($course->teacher_id);
                $relationship = $this->Courses->CoursesUsers->newEntity();
                $relationship->course_id = $course->id;
                $relationship->user_id = $teacher->id;
                if ($this->Courses->CoursesUsers->save($relationship)) {
                    $this->Flash->success(__('The course has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $teachers = $this->Courses->Users->find('teachers');
        foreach($teachers as $teacher) {
            $teacher_name = $teacher->first_name . ' ' . $teacher->last_name;
            $options[] = [$teacher->id => $teacher_name];
        }
        $this->set(compact('course', 'options'));
        $this->set('_serialize', ['course']);
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Users']
        ]);
        
        if ($this->Auth->user('role') != 1 && $this->Auth->user('id') != $course->teacher_id) {
            $this->Flash->error(__('You are not allowed to edit courses.'));
            return $this->redirect(['action' => 'view', $course->id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $users = $this->Courses->Users->find('list', ['limit' => 200]);
        $this->set(compact('course', 'users'));
        $this->set('_serialize', ['course']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to delete courses.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   public function myCourses()
    {
        $id = $this->Auth->user('id');
        $courses = $this->paginate($this->Courses->find('WithUser', ['user_id' => $id]));

        $this->set(compact('courses'));
        $this->set('_serialize', ['courses']);
    }
    
    public function syllabus($course_id)
    {
        $course = $this->Courses->get($course_id);
        $this->set('course', $course);
    }

    public function members($course_id)
    {
        $users = $this->paginate($this->Courses->Users->find('withCourse', ['course_id' => $course_id]));
        $course = $this->Courses->get($course_id);
        $this->set('teacher_id', $course->teacher_id);
        $this->set(compact('users')); 
        $this->set(['course_id' => $course_id]);
        $this->set('_serialize', ['users']);
    }
    
    public function addMember($course_id, $user_id = null)
    {
        
        $course = $this->Courses->get($course_id, [
            'contain' => ['Users']
        ]);
        
        if ($this->Auth->user('role') != 1 && $this->Auth->user('id') != $course->teacher_id) {
            $this->Flash->error(__('You are not allowed to add members to courses.'));
            return $this->redirect(['action' => 'view', $course_id]);
        }

        if ($user_id) {
            // Add the user to the course
            $relationship= $this->Courses->CoursesUsers->newEntity();
            $relationship->course_id = $course_id;
            $relationship->user_id = $user_id;
            if ($this->Courses->CoursesUsers->save($relationship)) {
                $this->Flash->success(__('The member has been added to the course.'));

                return $this->redirect(['action' => 'addMember', $course_id]);
            } else {
                $this->Flash->error(__('The member could not be added. Please, try again.'));
            }
            
        }
        $students = $this->paginate($this->Courses->Users->find('students'));
        $this->set(compact('students'));
        $course = $this->Courses->get($course_id);
        $this->set(compact('course'));
        $this->set('_serialize', ['students', 'course']);
    }
    
    public function deleteMember($course_id, $user_id)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to delete members from courses.'));
            return $this->redirect(['action' => 'view', $course_id]);
        }

        $this->request->allowMethod(['post', 'delete']);
        $relationship = $this->Courses->CoursesUsers->find('all')
            ->where(['user_id' => $user_id, 'course_id' => $course_id])->first();
        if ($this->Courses->CoursesUsers->delete($relationship)) {
            $this->Flash->success(__('The member has been deleted from the course.'));
        } else {
            $this->Flash->error(__('The member could not be deleted from the course. Please, try again.'));
        }

        return $this->redirect(['action' => 'members', $course_id]);
    }

    public function editTopics($course_id)
    {
        $topics = $this->Courses->Topics->find('withCourse', ['course_id' => $course_id]);
        $this->set(compact('topics')); 
        $this->set(['course_id' => $course_id]);
        $this->set('_serialize', ['topics']);
    }

    public function dashboard()
    {
        //You can use $this->Auth in every Controller. CakePHP supports login/out automatically.
        $id = $this->Auth->user('id');
        //I want to get my courses list. I created a function findWithUser($user_id) in Model/Table/CoursesTable.php
        $courses = $this->paginate($this->Courses->find('WithUser', ['user_id' => $id]));
        
        //Fetch Informations. btw, $this->Users means the Users table. Informations table has User's id as the publisher, so we can say users table and informations table has relationship. So We can call $this->Users->Informatinos  find('all') calls Model file and fetch data from databases.
        
        //These two lines pass the contents of $courses to the view(Templete file)
        $this->set(compact('courses'));
        $this->set('_serialize', ['courses']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

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
        $courses = $this->paginate($this->Courses->find('all')->contain('Images'));

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
    
        $this->set(compact('course', 'teacher', 'topics'));
        $this->set('_serialize', ['course', 'teacher', 'topics']);
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
            
            $course->forum_id = $this->createForum($course->title);
    
            $event_type = $this->Courses->EventTypes->newEntity();
            $event_type->name = $course->department . ' ' . $course->number;
            $event_type->color = "Blue";
            if ($this->Courses->EventTypes->save($event_type)) {
                $course->event_type_id = $event_type->id;
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
            'contain' => ['Images']
        ]);
        
        if ($this->Auth->user('role') != 1 && $this->Auth->user('id') != $course->teacher_id) {
            $this->Flash->error(__('You are not allowed to edit courses.'));
            return $this->redirect(['action' => 'view', $course->id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $course = $this->Courses->patchEntity($course, $data);

            if ($data['image']['size'] > 0 && $data['image']['error'] == 0) {
                $filename = Text::uuid() . $data['image']['name'];
                $filepath = 'course_images' . DS;
                $course->image->filename = $filename;
                $course->image->filepath = $filepath;
                if (!move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . 'img' . DS . $filepath . $filename)) {
                    $this->Flash->error(__('The image could not be saved. Please, try again.'));
                }
            }

            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'view', $course->id]);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $this->set(compact('course'));
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
        if ($this->Auth->user('role') == 1 || $this->Auth->user('role') == 5) {
            return $this->redirect(['action' => 'index']);
        }
        $id = $this->Auth->user('id');
        $courses = $this->Courses->find('WithUser', ['user_id' => $id])->contain(['Users', 'Images']);
        foreach($courses as $course) {
            $course->teacher = $this->Courses->Users->get($course->teacher_id);
        }

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
        
        $this->set(compact('users', 'course')); 
        $this->set('_serialize', ['users', 'course']);
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
        $this->request->allowMethod(['post', 'deleteMember']);

        $course = $this->Courses->get($course_id);
        if ($this->Auth->user('role') != 1 && $this->Auth->user('id') != $course->teacher_id) {
            $this->Flash->error(__('You are not allowed to delete members from courses.'));
            return $this->redirect(['action' => 'view', $course_id]);
        }

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
        $topics = $this->Courses->Topics->find('withCourse', ['course_id' => $course_id])->contain(['Assignments', 'Attachments']);
        $course = $this->Courses->get($course_id);
        $this->set(compact('topics', 'course')); 
        $this->set('_serialize', ['topics', 'course']);
    }

    private function createForum($name)
    {
        $forum = $this->Courses->Forums->newEntity();
        $forum->name = $name . 'Forum';
        $forum->created = date("Y-m-d H:i:s");
        $forum->modified = date("Y-m-d H:i:s");
        if ($this->Courses->Forums->save($forum)) {
            return $forum->id;
        }
        return 0;
    }

    public function openEvaluation($course_id)
    {
        $course = $this->Courses->get($course_id);
        $course->evaluation_opened = true;
        if ($this->Courses->save($course)) {
            $this->Flash->success(__('The evaluation forms are opened.'));
        } else {
            $this->Flash->error(__('Failed to open the evaluation forms.'));
        }
        return $this->redirect(['action' => 'view', $course_id]);
    }

}

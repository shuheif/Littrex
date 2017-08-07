<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Topics Controller
 *
 * @property \App\Model\Table\TopicsTable $Topics
 */
class TopicsController extends AppController
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
        $topics = $this->paginate($this->Topics);

        $this->set(compact('topics'));
        $this->set('_serialize', ['topics']);
    }

    /**
     * View method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $topic = $this->Topics->get($id, [
            'contain' => ['Courses', 'Assignments', 'Attachments']
        ]);

        $this->set('topic', $topic);
        $this->set('_serialize', ['topic']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($index, $course_id)
    {
        $new_topic = $this->Topics->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $topics = $this->Topics->find('withCourse', ['course_id' => $course_id]);
            foreach ($topics as $topic) {
                if ($topic->topic_index >= $index) {
                    $topic->topic_index = $topic->topic_index + 1;
                    if (!$this->Topics->save($topic)) {
                        $this->Flash->error(__('The topic index could not be saved. Please, try again.'));
                    }
                }
            }

            $data = $this->request->data;
            $data['topic_index'] = $index;
            $data['course_id'] = $course_id;
            $new_topic = $this->Topics->patchEntity($new_topic, $data);

            if ($this->Topics->save($new_topic)) {
                $this->Flash->success(__('The topic has been saved.'));
                return $this->redirect(['controller' => 'Courses', 'action' => 'editTopics', $course_id]);
            } 
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $this->set(compact('new_topic'));
        $this->set('course_id', $index, $course_id);
        $this->set('_serialize', ['new_topic']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $course_id)
    {
        $topic = $this->Topics->get($id, [
            'contain' => ['Assignments', 'Attachments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $topic = $this->Topics->patchEntity($topic, $this->request->data);
            if ($this->Topics->save($topic)) {
                $this->Flash->success(__('The topic has been saved.'));

                return $this->redirect(['controller' => 'Courses', 'action' => 'editTopics', $course_id]);
            }
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $assignments = $this->Topics->Assignments->find('withCourse', ['course_id' => $course_id]);
        $attachments = $this->Topics->Attachments->find();
        $this->set('course_id', $course_id);
        $this->set(compact('topic', 'courses', 'assignments', 'attachments'));
        $this->set('_serialize', ['topic']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $topic = $this->Topics->get($id);
        if ($this->Topics->delete($topic)) {
            $this->Flash->success(__('The topic has been deleted.'));
        } else {
            $this->Flash->error(__('The topic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

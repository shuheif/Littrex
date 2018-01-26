<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Topics Controller
 *
 * @property \App\Model\Table\TopicsTable $Topics
 */
class AnnouncementsController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($index, $club_id)
    {
        $new_topic = $this->Announcements->newEntity();
        $club = $this->Announcements->Clubs->get($club_id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $announcements = $this->Announcements->find('withClub', ['club_id' => $club_id]);
            foreach ($announcements as $topic) {
                if ($topic->topic_index >= $index) {
                    $topic->topic_index = $topic->topic_index + 1;
                    if (!$this->Announcements->save($topic)) {
                        $this->Flash->error(__('The topic index could not be saved. Please, try again.'));
                    }
                }
            }

            $data = $this->request->data;
            $data['topic_index'] = $index;
            $data['club_id'] = $club_id;
            $new_topic = $this->Announcements->patchEntity($new_topic, $data);

            if ($this->Announcements->save($new_topic)) {
                $this->Flash->success(__('The topic has been saved.'));

                $this->createTopicNotification($club_id, 1);
                return $this->redirect(['controller' => 'Clubs', 'action' => 'editTopics', $club_id]);
            } 
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $this->set(compact('new_topic', 'club'));
        $this->set('_serialize', ['new_topic', 'club']);
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
                $this->createTopicNotification($course_id, 2);// notification_type = 2(edit);

                return $this->redirect(['controller' => 'Courses', 'action' => 'editTopics', $course_id]);
            }
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $course = $this->Topics->Courses->get($course_id);
        $this->set('course_id', $course_id);
        $this->set(compact('topic', 'course'));
        $this->set('_serialize', ['topic', 'course']);
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
        $course_id = $topic->course_id;
        if ($this->Topics->delete($topic)) {
            $this->Flash->success(__('The topic has been deleted.'));
        } else {
            $this->Flash->error(__('The topic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Courses', 'action' => 'editTopics', $course_id]);
    }

    public function linkAssignment($topic_id, $course_id, $assignment_id = null)
    {
        $assignments = $this->Topics->Courses->Assignments->find('withCourse', ['course_id' => $course_id]);
        if ($this->request->is('post')) {
            $relationship = $this->Topics->AssignmentsTopics->newEntity();
            $relationship->topic_id = $topic_id;
            $relationship->course_id = $course_id;
            $relationship->assignment_id = $assignment_id;

            if ($this->Topics->AssignmentsTopics->save($relationship)) {
                $this->Flash->success(__('The assignment has been linked to the topic.'));
                return $this->redirect(['controller' => 'Courses', 'action' => 'editTopics', $course_id]);
            } 
            $this->Flash->error(__('The assignment could not be linked to the topic. Please, try again.'));
        }
        $this->set('topic_id', $topic_id); 
        $this->set('course_id', $course_id);
        $this->set(compact('assignments'));
        $this->set('_serialize', ['assignments']);
    }

    private function createTopicNotification($club_id, $type)
    {
        $Notifications = TableRegistry::get('Notifications');
        // Create notification and messages to all members.
        $notification = $Notifications->newEntity();
        $notification->type = $type;
        $notification->variable1 = $club_id;
        $notification->date = date("Y-m-d H:i:s");
        $notification->sender_id = $this->Auth->user('id');
                
        if ($Notifications->save($notification)) {
            $Messages = TableRegistry::get('Messages');
            $members = $this->Announcements->Clubs->Users->find('withClub', ['club_id' => $club_id]);
            foreach($members as $member) {
                $message = $Messages->newEntity();
                $message->notification_id = $notification->id;
                $message->receiver_id = $member->id;
                $message->isRead = 0;
                $Messages->save($message);
            }
        }
    }
}

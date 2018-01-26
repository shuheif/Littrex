<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ForumTopics Controller
 *
 * @property \App\Model\Table\ForumTopicsTable $ForumTopics
 */
class ForumtopicsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Forums', 'Users']
        ];
        $forumtopics = $this->paginate($this->ForumTopics);

        $this->set(compact('forumtopics'));
        $this->set('_serialize', ['forumtopics']);
    }

    /**
     * View method
     *
     * @param string|null $id Forum Topic id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forumTopic = $this->Forumtopics->get($id, [
            'contain' => ['Forums', 'Users']
        ]);
        $Posts = TableRegistry::get('Posts');
        $posts = $Posts->find('all')->where(['topic_id' => $forumTopic->id])->contain('Users');

        $this->set(compact('forumTopic', 'posts'));
        $this->set('_serialize', ['forumTopic', 'posts']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($forum_id)
    {
        $forumtopic = $this->Forumtopics->newEntity();
        if ($this->request->is('post')) {
            $forumtopic = $this->Forumtopics->patchEntity($forumtopic, $this->request->data);
            $forumtopic->forum_id = $forum_id;
            $forumtopic->user_id = $this->Auth->user('id');

            if ($this->Forumtopics->save($forumtopic)) {
                                $this->Flash->success(__('The forum topic has been saved.'));

                return $this->redirect(['controller' => 'Forums', 'action' => 'view', $forum_id]);
            }
            $this->Flash->error(__('The forum topic could not be saved. Please, try again.'));
        }

        $forum = $this->Forumtopics->Forums->get($forum_id);
        $this->set(compact('forumtopic', 'forum'));
        $this->set('_serialize', ['forumtopic', 'forum']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum Topic id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forumTopic = $this->Forumtopics->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forumTopic = $this->Forumtopics->patchEntity($forumTopic, $this->request->data);
            if ($this->ForumTopics->save($forumTopic)) {
                $this->Flash->success(__('The forum topic has been saved.'));

                return $this->redirect(['controller' => 'Forums', 'action' => 'view', $forumTopic->forum_id]);
            }
            $this->Flash->error(__('The forum topic could not be saved. Please, try again.'));
        }
        $forum = $this->Forumtopics->Forums->get($forumTopic->forum_id);
        $this->set(compact('forumTopic', 'forum'));
        $this->set('_serialize', ['forumTopic', 'forum']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum Topic id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forumTopic = $this->ForumTopics->get($id);
        if ($this->ForumTopics->delete($forumTopic)) {
            $this->Flash->success(__('The forum topic has been deleted.'));
        } else {
            $this->Flash->error(__('The forum topic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

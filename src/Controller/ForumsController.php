<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Forums Controller
 *
 * @property \App\Model\Table\ForumsTable $Forums
 */
class ForumsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $forums = $this->paginate($this->Forums);

        $this->set(compact('forums'));
        $this->set('_serialize', ['forums']);
    }

    /**
     * View method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forum = $this->Forums->get($id);
        $forum_topics = $this->Forums->Forumtopics->find('all')->where(['forum_id' => $forum->id])->contain('Users');;

        $this->set(compact('forum', 'forum_topics'));
        $this->set('_serialize', ['forum', 'forum_topics']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forum = $this->Forums->newEntity();
        if ($this->request->is('post')) {
            $forum = $this->Forums->patchEntity($forum, $this->request->data);
            $forum->created = date("Y-m-d H:i:s");
            $forum->modified = date("Y-m-d H:i:s");
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum could not be saved. Please, try again.'));
        }
        $this->set(compact('forum'));
        $this->set('_serialize', ['forum']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forum = $this->Forums->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forum = $this->Forums->patchEntity($forum, $this->request->data);
            $forum->modified = date("Y-m-d H:i:s");
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));

                return $this->redirect(['controller' => 'Forums', 'action' => 'view', $forum->id]);
            }
            $this->Flash->error(__('The forum could not be saved. Please, try again.'));
        }
        $this->set(compact('forum'));
        $this->set('_serialize', ['forum']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forum = $this->Forums->get($id);
        if ($this->Forums->delete($forum)) {
            $this->Flash->success(__('The forum has been deleted.'));
        } else {
            $this->Flash->error(__('The forum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    private function createForum($name)
    {
        $forum = $this->Forums->newEntity();
        $forum->name = $name;
        $forum->created = date("Y-m-d H:i:s");
        $forum->modified = date("Y-m-d H:i:s");
        if ($this->Forums->save($forum)) {
            $this->Flash->success(__('The forum has been saved.'));
            return $forum->id;
        }
    }

    public function hoge() {
        debug("hoge");
    }
}

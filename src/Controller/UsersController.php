<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Utility\Text;

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
        $this->Auth->allow(['logout', 'add']);
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

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
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
        $this->set('now', Time::now());
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
                // WWW_ROOT /home/users/0/raindrop.jp-shuhei/web/shuhei_dev/webroot/
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
    
    public function addRelationship($parent_id, $child_id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to add children to users.'));
            return $this->redirect(['action' => 'view', $parent_id]);
        }
        $parent = $this->Users->get($parent_id);
        if ($parent->role != 4) {
            $this->Flash->error(__('The relationship could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'view', $parent_id]);
        }
        
        if ($child_id) {
            // Add the child to the parent
            $relationship= $this->Users->UsersUsers->newEntity();
            $relationship->parent_id = $parent_id;
            $relationship->child_id = $child_id;
            if ($this->Users->UsersUsers->save($relationship)) {
                $this->Flash->success(__('The relationship has been saved to the parent.'));
                return $this->redirect(['action' => 'addChild', $parent_id]);
            } else {
                $this->Flash->error(__('The relationship could not be saved. Please, try again.'));
            }
        }
        $students = $this->paginate($this->Users->find('students'));
        $this->set(compact('students'));
        $this->set(compact('parent'));
        $this->set('_serialize', ['students', 'parent']);
    }

    public function login()
    {
        $this->viewBuilder()->autoLayout(false);

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        //$this->Flash->success('logged out');
        return $this->redirect($this->Auth->logout());
    }

}

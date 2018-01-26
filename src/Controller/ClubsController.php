<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['view', 'index', 'members']);
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
        $clubs = $this->paginate($this->Clubs);

        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
    }

    /**
     * View method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => ['Images', 'Users']
        ]);
        $announcements = $this->Clubs->Announcements->find('withClub', ['club_id' => $id, 'contain' => ['Attachments']]);

        $this->set(compact('club', 'announcements'));
        $this->set('_serialize', ['club', 'announcements']);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to add clubs.'));
            return $this->redirect(['action' => 'index']);
        }
        $club = $this->Clubs->newEntity();

        
        if ($this->request->is('post')) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            
            $club->forum_id = $this->createForum($club->name);

            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The club could not be saved. Please, try again.'));
        }
        $images = $this->Clubs->Images->find('list', ['limit' => 200]);
        $users = $this->Clubs->Users->find('list', ['limit' => 200]);
        $this->set(compact('club', 'images', 'users'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to edit clubs.'));
            return $this->redirect(['action' => 'index']);
        }

        $club = $this->Clubs->get($id, [
            'contain' => ['Users', 'Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $club = $this->Clubs->patchEntity($club, $data);
            if ($data['image']['size'] > 0 && $data['image']['error'] == 0) {
                $filename = Text::uuid() . $data['image']['name'];
                $club->image->filename = $filename;
                $club->image->filepath = 'club_images';
                // WWW_ROOT /home/users/0/raindrop.jp-shuhei/web/shuhei_dev/webroot/
                if (!move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . 'img/club_images/' . $filename)) {
                    $this->Flash->error(__('The image could not be saved. Please, try again.'));
                }
            }

            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('The club has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The club could not be saved. Please, try again.'));
        }
        $this->set(compact('club'));
        $this->set('_serialize', ['club']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to delete clubs.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to delete clubs.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $club = $this->Clubs->get($id);
        if ($this->Clubs->delete($club)) {
            $this->Flash->success(__('The club has been deleted.'));
        } else {
            $this->Flash->error(__('The club could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function myClubs()
    {
        if ($this->Auth->user()){
            $id = $this->Auth->user('id');
            $clubs = $this->paginate($this->Clubs->find('WithUser', ['user_id' => $id]));

            $this->set(compact('clubs'));
            $this->set('_serialize', ['clubs']);
        }
    }

    public function members($club_id)
    {
        $users = $this->paginate($this->Clubs->Users->find('withClub', ['club_id' => $club_id]));
        $club = $this->Clubs->get($club_id);
        $this->set(compact('users', 'club')); 
        $this->set('_serialize', ['users', 'club']);
    }
    
    public function addMember($club_id, $user_id = null)
    {
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to add members to clubs.'));
            return $this->redirect(['action' => 'members', $club_id]);
        }

        $club = $this->Clubs->get($club_id, [
            'contain' => ['Users']
        ]);
        
        if ($user_id) {
            // Add the user to the course
            $relationship= $this->Clubs->ClubsUsers->newEntity();
            $relationship->club_id = $club_id;
            $relationship->user_id = $user_id;
            if ($this->Clubs->ClubsUsers->save($relationship)) {
                $this->Flash->success(__('The member has been added to the club.'));

                return $this->redirect(['action' => 'addMember', $club_id]);
            } else {
                $this->Flash->error(__('The member could not be added. Please, try again.'));
            }
            
        }
        $users = $this->paginate($this->Clubs->Users->find('all')->contain('Images'));//Every members including faculty and admin can be added.
        $this->set(compact('users'));
        $course = $this->Clubs->get($club_id);
        $this->set(compact('club'));
        $this->set('_serialize', ['users', 'club']);
    }
    
    public function deleteMember($club_id, $user_id)
    {     
        $this->request->allowMethod(['post', 'deleteMember']);
        if ($this->Auth->user('role') != 1) {
            $this->Flash->error(__('You are not allowed to delete members from clubs.'));
            return $this->redirect(['action' => 'members', $club_id]);
        }

        $relationship = $this->Clubs->ClubsUsers->find('all')
            ->where(['user_id' => $user_id, 'club_id' => $club_id])->first();
        if ($this->Clubs->ClubsUsers->delete($relationship)) {
            $this->Flash->success(__('The member has been deleted from the club.'));
        } else {
            $this->Flash->error(__('The member could not be deleted from the club. Please, try again.'));
        }

        return $this->redirect(['action' => 'members', $club_id]);
    }

    private function createForum($name)
    {
        $forum = $this->Clubs->Forums->newEntity();
        $forum->name = $name . 'Forum';
        $forum->created = date("Y-m-d H:i:s");
        $forum->modified = date("Y-m-d H:i:s");
        if ($this->Clubs->Forums->save($forum)) {
            return $forum->id;
        }
        return 0;
    }

    public function editAnnouncements($club_id)
    {
        $announcements = $this->Clubs->Announcements->find('withClub', ['club_id' => $club_id])->contain(['Attachments']);
        $club = $this->Clubs->get($club_id);
        $this->set(compact('announcements', 'club')); 
        $this->set('_serialize', ['announcements', 'club']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 */
class InformationsController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $informations = $this->paginate($this->Informations);

        $this->set(compact('informations'));
        $this->set('_serialize', ['informations']);
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('information', $information);
        $this->set('_serialize', ['information']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $information = $this->Informations->newEntity();
        if ($this->request->is('post')) {
            $information = $this->Informations->patchEntity($information, $this->request->data);
            $information->user_id = $this->Auth->user('id');
            $information->date = date("Y-m-d H:i:s");
            if ($this->Auth->user('role') == 1) {
                $information->priority = 2;
            } else if ($this->Auth->user('role') == 5) {
                $information->priority = 1;
            }


            if ($this->Auth->user('role') == 1) {
                // Admin user
                $information->priority = 2;
            } else if ($this->Auth->user('role') == 5) {
                // Government user
                $information->priotity = 1;
            }

            if ($this->Informations->save($information)) {
                if ($information->priority == 1) {
                    $this->createInformationNotification($information->id, 7);
                } else if ($information->priority == 2) {
                    $this->createInformationNotification($information->id, 6);
                }
                $this->Flash->success(__('The information has been saved.'));

                if($this->Auth->user('role') == 1) {
                    return $this->redirect(['action' => 'schoolInfo']);
                }
                if($this->Auth->user('role') == 5)  {
                    return $this->redirect(['action' => 'governmentInfo']);
                }
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $users = $this->Informations->Users->find('list', ['limit' => 200]);
        $this->set(compact('information', 'users'));
        $this->set('_serialize', ['information']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Informations->patchEntity($information, $this->request->data);
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                if($this->Auth->user('role') == 1) {
                    return $this->redirect(['action' => 'schoolInfo']);
                }
                if($this->Auth->user('role') == 5)  {
                    return $this->redirect(['action' => 'governmentInfo']);
                }
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $users = $this->Informations->Users->find('list', ['limit' => 200]);
        $this->set(compact('information', 'users'));
        $this->set('_serialize', ['information']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Informations->get($id);
        if ($this->Informations->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function schoolInfo()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $informations = $this->paginate($this->Informations->find('all')->where(['Informations.priority' => 2]));

        $this->set(compact('informations'));
        $this->set('_serialize', ['informations']);
    }

    public function governmentInfo()
    {    
        $this->paginate = [
            'contain' => ['Users']
        ];
        $informations = $this->paginate($this->Informations->find('all')->where(['Informations.priority' => 1]));

        $this->set(compact('informations'));
        $this->set('_serialize', ['informations']);

    }

    private function createInformationNotification($information_id, $type)
    {
        $Notifications = TableRegistry::get('Notifications');
        // Create notification and messages to all members.
        $notification = $Notifications->newEntity();
        $notification->type = $type;
        $notification->variable1 = $information_id;
        $notification->date = date("Y-m-d H:i:s");
        $notification->sender_id = $this->Auth->user('id');
                
        if ($Notifications->save($notification)) {
            $Messages = TableRegistry::get('Messages');
            $members = $this->Informations->Users->find('all');
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

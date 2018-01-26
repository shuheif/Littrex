<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

/**
 * Schools Controller
 *
 * @property \App\Model\Table\SchoolsTable $Schools
 */
class SchoolsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        if ($this->Auth->user('role') != 5) {
            return $this->redirect("http://littrex.com");
        }
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
        $schools = $this->paginate($this->Schools);

        $this->set(compact('schools'));
        $this->set('_serialize', ['schools']);
    }

    /**
     * View method
     *
     * @param string|null $id School id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $school = $this->Schools->get($id, [
            'contain' => ['Images']
        ]);

        $this->set('school', $school);
        $this->set('_serialize', ['school']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $school = $this->Schools->newEntity();
        if ($this->request->is('post')) {
            $school = $this->Schools->patchEntity($school, $this->request->data);
            if ($data['image']['size'] > 0 && $data['image']['error'] == 0) {
                $filename = Text::uuid() . $data['image']['name'];
                $school->image->filename = $filename;
                $school->image->filepath = 'school_images';
                if (!move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . 'img/school_images/' . $filename)) {
                    $this->Flash->error(__('The image could not be saved. Please, try again.'));
                }
            }
            
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }

        $this->set(compact('school'));
        $this->set('_serialize', ['school']);
    }

    /**
     * Edit method
     *
     * @param string|null $id School id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $school = $this->Schools->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $school = $this->Schools->patchEntity($school, $data);
            
            if ($data['image']['size'] > 0 && $data['image']['error'] == 0) {
                $filename = Text::uuid() . $data['image']['name'];
                $school->image->filename = $filename;
                $school->image->filepath = 'school_images';
                if (!move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . 'img/school_images/' . $filename)) {
                    $this->Flash->error(__('The image could not be saved. Please, try again.'));
                }
            }
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }
        $images = $this->Schools->Images->find('list', ['limit' => 200]);
        $this->set(compact('school', 'images'));
        $this->set('_serialize', ['school']);
    }

    /**
     * Delete method
     *
     * @param string|null $id School id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $school = $this->Schools->get($id);
        if ($this->Schools->delete($school)) {
            $this->Flash->success(__('The school has been deleted.'));
        } else {
            $this->Flash->error(__('The school could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

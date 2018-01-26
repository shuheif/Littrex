<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Http\Response;

/**
 * Attachments Controller
 *
 * @property \App\Model\Table\AttachmentsTable $Attachments
 */
class AttachmentsController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($topic_id, $course_id)
    {
        $attachment = $this->Attachments->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $attachment = $this->Attachments->patchEntity($attachment, $data);
            if ($data['attachment']['size'] > 0 && $data['attachment']['error'] == 0) {
                $filename = Text::uuid() . $data['attachment']['name'];
                $filepath = 'attachments/user_attachments/';
                $attachment->filename = $filename;
                $attachment->filepath = $filepath;
                // WWW_ROOT /home/users/0/raindrop.jp-shuhei/web/shuhei_dev/webroot/
                if (move_uploaded_file($data['attachment']['tmp_name'], WWW_ROOT . $filepath . $filename)) {
                    if ($this->Attachments->save($attachment)) {
                        $relationship = $this->Attachments->AttachmentsTopics->newEntity();
                        $relationship->attachment_id = $attachment->id;
                        $relationship->topic_id = $topic_id;
                        debug($relationship);
                        if ($this->Attachments->AttachmentsTopics->save($relationship)) {
                            $this->Flash->success(__('The attachment has been saved.'));
                            return $this->redirect(['controller' => 'Courses', 'action' => 'editTopics', $course_id]);
                        }
                    }
                }
            }
            $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
        }
        $this->set('attachment', $attachment);
        $this->set('topic_id', $topic_id);
        $this->set('course_id', $course_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachment = $this->Attachments->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->data);
            if ($this->Attachments->save($attachment)) {
                $this->Flash->success(__('The attachment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
        }
        $cells = $this->Attachments->Cells->find('list', ['limit' => 200]);
        $this->set(compact('attachment'));
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachment = $this->Attachments->get($id);
        if ($this->Attachments->delete($attachment)) {
            $this->Flash->success(__('The attachment has been deleted.'));
        } else {
            $this->Flash->error(__('The attachment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function download($id)
    {
        $attachment = $this->Attachments->get($id);
        $this->response->file(WWW_ROOT . 'attachments/' . $attachment->filepath . $attachment->filename);
        return $this->response;
    }
}

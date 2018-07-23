<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stages Controller
 *
 * @property \App\Model\Table\StagesTable $Stages
 *
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $stages = $this->paginate($this->Stages);

        $this->set(compact('stages'));
    }

    /**
     * View method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stage = $this->Stages->get($id, [
            'contain' => ['Matches']
        ]);

        $this->set('stage', $stage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stage = $this->Stages->newEntity();
        if ($this->request->is('post')) {
            $stage = $this->Stages->patchEntity($stage, $this->request->getData());
            if ($this->Stages->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stage could not be saved. Please, try again.'));
        }
        $this->set(compact('stage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stage = $this->Stages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stage = $this->Stages->patchEntity($stage, $this->request->getData());
            if ($this->Stages->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stage could not be saved. Please, try again.'));
        }
        $this->set(compact('stage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stage = $this->Stages->get($id);
        if ($this->Stages->delete($stage)) {
            $this->Flash->success(__('The stage has been deleted.'));
        } else {
            $this->Flash->error(__('The stage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

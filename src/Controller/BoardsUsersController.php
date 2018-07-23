<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BoardsUsers Controller
 *
 * @property \App\Model\Table\BoardsUsersTable $BoardsUsers
 *
 * @method \App\Model\Entity\BoardsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoardsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Boards', 'Users']
        ];
        $boardsUsers = $this->paginate($this->BoardsUsers);

        $this->set(compact('boardsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Boards User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $boardsUser = $this->BoardsUsers->get($id, [
            'contain' => ['Boards', 'Users']
        ]);

        $this->set('boardsUser', $boardsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $boardsUser = $this->BoardsUsers->newEntity();
        if ($this->request->is('post')) {
            $boardsUser = $this->BoardsUsers->patchEntity($boardsUser, $this->request->getData());
            if ($this->BoardsUsers->save($boardsUser)) {
                $this->Flash->success(__('The boards user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The boards user could not be saved. Please, try again.'));
        }
        $boards = $this->BoardsUsers->Boards->find('list', ['limit' => 200]);
        $users = $this->BoardsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('boardsUser', 'boards', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Boards User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $boardsUser = $this->BoardsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $boardsUser = $this->BoardsUsers->patchEntity($boardsUser, $this->request->getData());
            if ($this->BoardsUsers->save($boardsUser)) {
                $this->Flash->success(__('The boards user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The boards user could not be saved. Please, try again.'));
        }
        $boards = $this->BoardsUsers->Boards->find('list', ['limit' => 200]);
        $users = $this->BoardsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('boardsUser', 'boards', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Boards User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $boardsUser = $this->BoardsUsers->get($id);
        if ($this->BoardsUsers->delete($boardsUser)) {
            $this->Flash->success(__('The boards user has been deleted.'));
        } else {
            $this->Flash->error(__('The boards user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

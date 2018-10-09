<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Biddings Controller
 *
 *
 * @method \App\Model\Entity\Bidding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BiddingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $biddings = $this->paginate($this->Biddings);

        $this->set(compact('biddings'));
    }

    /**
     * View method
     *
     * @param string|null $id Bidding id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bidding = $this->Biddings->get($id, [
            'contain' => []
        ]);

        $this->set('bidding', $bidding);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null adds a record to the biddings table
     */
    public function openBid()
    {
        $bidding = $this->Biddings->newEntity();
        if ($this->request->is('post')) {
            $bidding = $this->Biddings->patchEntity($bidding, $this->request->getData());
            if ($this->Biddings->save($bidding)) {
                \Cake\Log\Log::debug("Saved Bidding");
            }
        }
         $this->set(compact('bidding'));
         $this->set('_serialize', true);
    }

    public function closeBid()
    {
        $bidding = $this->Biddings->closeBid($this->request->getData());
        $this->set(compact('bidding'));
        $this->set('_serialize', true);
    }

    public function getBidPlayer()
    {
        $this->set('bids',$this->Biddings->getBidPlayer($this->request->getData()));
        $this->set('_serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bidding id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bidding = $this->Biddings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bidding = $this->Biddings->patchEntity($bidding, $this->request->getData());
            if ($this->Biddings->save($bidding)) {
                $this->Flash->success(__('The bidding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bidding could not be saved. Please, try again.'));
        }
        $this->set(compact('bidding'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bidding id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bidding = $this->Biddings->get($id);
        if ($this->Biddings->delete($bidding)) {
            $this->Flash->success(__('The bidding has been deleted.'));
        } else {
            $this->Flash->error(__('The bidding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

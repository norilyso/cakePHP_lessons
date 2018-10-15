<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TempAmazonBooks Controller
 *
 * @property \App\Model\Table\TempAmazonBooksTable $TempAmazonBooks
 *
 * @method \App\Model\Entity\TempAmazonBook[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TempAmazonBooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tempAmazonBooks = $this->paginate($this->TempAmazonBooks);

        $this->set(compact('tempAmazonBooks'));
    }

    /**
     * View method
     *
     * @param string|null $id Temp Amazon Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tempAmazonBook = $this->TempAmazonBooks->get($id, [
            'contain' => []
        ]);

        $this->set('tempAmazonBook', $tempAmazonBook);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tempAmazonBook = $this->TempAmazonBooks->newEntity();
        if ($this->request->is('post')) {
            $tempAmazonBook = $this->TempAmazonBooks->patchEntity($tempAmazonBook, $this->request->getData());
            if ($this->TempAmazonBooks->save($tempAmazonBook)) {
                $this->Flash->success(__('The temp amazon book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temp amazon book could not be saved. Please, try again.'));
        }
        $this->set(compact('tempAmazonBook'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Temp Amazon Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tempAmazonBook = $this->TempAmazonBooks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tempAmazonBook = $this->TempAmazonBooks->patchEntity($tempAmazonBook, $this->request->getData());
            if ($this->TempAmazonBooks->save($tempAmazonBook)) {
                $this->Flash->success(__('The temp amazon book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temp amazon book could not be saved. Please, try again.'));
        }
        $this->set(compact('tempAmazonBook'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Temp Amazon Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tempAmazonBook = $this->TempAmazonBooks->get($id);
        if ($this->TempAmazonBooks->delete($tempAmazonBook)) {
            $this->Flash->success(__('The temp amazon book has been deleted.'));
        } else {
            $this->Flash->error(__('The temp amazon book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

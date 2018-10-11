<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AmazonBooks Controller
 *
 * @property \App\Model\Table\AmazonBooksTable $AmazonBooks
 *
 * @method \App\Model\Entity\AmazonBook[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AmazonBooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
//        $amazonBooks = $this->paginate($this->AmazonBooks);

        //検索条件取得
        $q_keyword = $this->request->query('q_keyword');
        $q_container = $this->request->query('q_container');
        $q_shelf = $this->request->query('q_shelf');

        $this->log($q_keyword);
        $this->log($q_container);
        $this->log($q_shelf);


        $amazonBooks = $this->paginate($this->AmazonBooks->find('all')
                                            ->where(['item_name like' => '%'.$q_keyword.'%',
                                             //        'SKU like' => $q_container.'%'.$q_shelf                                       
                                                    'SKU like' => $q_container.'%',
                                                    'SKU REGEXP' => '[0-9]'.$q_shelf.'$',
                                                    'quantity > ' => '0'
                                             ])
                                        );

        $this->set(compact('amazonBooks'));
    }

    public function find()
    {
        //検索条件取得
        $q_keyword = $this->request->query('q_keyword');
        $q_container = $this->request->query('q_container');
        $q_shelf = $this->request->query('q_shelf');

        $amazonBooks = $this->paginate($this->AmazonBooks
                                            ->where(["item_name like '%".$q_keyword."%'",
                                                     "SKU like '".$q_container."%'",
                                                     "SKU like '%".$q_container."'"                                                                 
                                            ])
                                        );

        $this->set(compact('amazonBooks'));
    }

    /**
     * View method
     *
     * @param string|null $id Amazon Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $amazonBook = $this->AmazonBooks->get($id, [
            'contain' => []
        ]);

        $this->set('amazonBook', $amazonBook);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $amazonBook = $this->AmazonBooks->newEntity();
        if ($this->request->is('post')) {
            $amazonBook = $this->AmazonBooks->patchEntity($amazonBook, $this->request->getData());
            if ($this->AmazonBooks->save($amazonBook)) {
                $this->Flash->success(__('The amazon book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amazon book could not be saved. Please, try again.'));
        }
        $this->set(compact('amazonBook'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Amazon Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $amazonBook = $this->AmazonBooks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $amazonBook = $this->AmazonBooks->patchEntity($amazonBook, $this->request->getData());
            if ($this->AmazonBooks->save($amazonBook)) {
                $this->Flash->success(__('The amazon book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amazon book could not be saved. Please, try again.'));
        }
        $this->set(compact('amazonBook'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Amazon Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $amazonBook = $this->AmazonBooks->get($id);
        if ($this->AmazonBooks->delete($amazonBook)) {
            $this->Flash->success(__('The amazon book has been deleted.'));
        } else {
            $this->Flash->error(__('The amazon book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TempPosts Controller
 *
 * @property \App\Model\Table\TempPostsTable $TempPosts
 *
 * @method \App\Model\Entity\TempPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TempPostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tempPosts = $this->paginate($this->TempPosts);

        $this->set(compact('tempPosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Temp Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tempPost = $this->TempPosts->get($id, [
            'contain' => []
        ]);

        $this->set('tempPost', $tempPost);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tempPost = $this->TempPosts->newEntity();
        if ($this->request->is('post')) {
            $tempPost = $this->TempPosts->patchEntity($tempPost, $this->request->getData());
            if ($this->TempPosts->save($tempPost)) {
                $this->Flash->success(__('The temp post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temp post could not be saved. Please, try again.'));
        }
        $this->set(compact('tempPost'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Temp Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tempPost = $this->TempPosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tempPost = $this->TempPosts->patchEntity($tempPost, $this->request->getData());
            if ($this->TempPosts->save($tempPost)) {
                $this->Flash->success(__('The temp post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The temp post could not be saved. Please, try again.'));
        }
        $this->set(compact('tempPost'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Temp Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tempPost = $this->TempPosts->get($id);
        if ($this->TempPosts->delete($tempPost)) {
            $this->Flash->success(__('The temp post has been deleted.'));
        } else {
            $this->Flash->error(__('The temp post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function import(){
        //$filename = TMP . 'tempPost.csv';
        $filename = 'C:\workspace\temp\tempPost.csv';
        if($this->CsvImport->importCSV('TempPosts', $filename)){
            $this->Flash->success(__('The CSV has been saved.'));
        } else {
            $this->Flash->error(__('The CSV has some errors.'));
        }
        $this->redirect(array('action' => 'index')); 
    }

    public function import_old(){
        //$filename = TMP . 'tempPost.csv';
        $filename = 'C:\workspace\temp\tempPost.csv';

        $this->TempPosts->deleteAll('1=1');
        $tempPost = $this->TempPosts->newEntity();

        $tempPost_arr = [];
//        if ($this->request->is('post')) {
//        $filename = $this->request->data['import_csv']['tmp_name'];
            
        $handle = fopen($filename, "r");
        //1行目を読み込む　CSVタイトル＝テーブルカラム名ならこちらでOK
        $header = fgetcsv($handle);
        
        //CSVタイトル<>テーブルカラム名の時は、モデルよりカラム名取得。
        $header= $this->TempPosts->schema()->columns();
        //CSVにない項目を削除 (id, created, modified)
        $header = array_values(array_diff($header,array("id","created","modified")));

        // $return = array(
        //     'messages' => array(),
        //     'errors' => array(),
        // );

        $i = 1;
        while (($row = fgetcsv($handle)) !== FALSE) {
            $i++; /* This is line 38 */
            $data = array();
            $tempPost = $this->TempPosts->newEntity();
            
            // for each header field
            foreach ($header as $k => $head) {
                // get the data field from Model.field
                if (strpos($head, '.') !== false) {
                    $h = explode('.', $head);
                    $data[$h[0]][$h[1]] = (isset($row[$k])) ? $row[$k] : "";
                }
                // get the data field from field
                else {
                    $data[$head] = (isset($row[$k])) ? $row[$k] : "";
                }
            }

            $tempPost = $this->TempPosts->patchEntity($tempPost, $data);
            if (!$this->TempPosts->save($tempPost)) {
                $user_arr[$i] = implode(",", $data);
            }

            /*　デバッグ用
            try {
                $this->TempPosts->saveOrFail($tempPost, $data);
            } catch (\Cake\ORM\Exception\PersistenceFailedException $e) {
            //    echo $e;
            //  echo $e->getEntity();
                $user_arr[$i] = strval($i).$user_arr[$i].$tempPost;
            }
            */
        }
        if (empty($user_arr)) {
            $this->Flash->success(__('The CSV has been saved.'));
        } else {
            $this->Flash->error(__(implode("：", $user_arr)));
        }

        $this->redirect(array('action' => 'index'));        
    }

}

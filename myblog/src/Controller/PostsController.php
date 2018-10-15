<?php
    // post/index
    // post/
    // (controller)/(action)/(options)

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $posts = $this->Posts->find('all');
        $this->set('posts',$posts);
    }
    public function view($id = null)
    {
        $post = $this->Posts->get($id, ['contain'=>'Comments']);
        $this->set(compact('post'));
    }
    public function add()
    {
        $post = $this->Posts->newEntity();

        if($this->request->is('post')){
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success('Add Success!!');
                return $this->redirect(['action'=>'index']);    
            } else {
                //error
                $this->Flash->error('Add Error!!');
            }
            
        }
        $this->set(compact('post'));
    }
    public function edit($id = null)
    {
        $post = $this->Posts->get($id);

        if($this->request->is(['post','patch','put'])){
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success('Edit Success!!');
                return $this->redirect(['action'=>'index']);    
            } else {
                //error
                $this->Flash->error('Edit Error!!');
            }
            
        }
        $this->set(compact('post'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post','delete']);
        $post = $this->Posts->get($id);

        if ($this->Posts->delete($post)) {
            $this->Flash->success('Delete Success!!');
        } else {
            //error
            $this->Flash->error('Delete Error!!');
        }
        return $this->redirect(['action'=>'index']);    
    }

    public function import(){
        $filename = TMP . 'post.csv';
        if(file_exists($filename)) {        
            $db = $this->Post->getDataSource();
            $db->begin($this->post);       
            //$this->User->deleteAll('1 = 1');
        
            $this->Post->importCSV($filename);
        
            if($this->Post->getImportErrors()) {
                $db->rollback($this->Post);
                $this->Flash->error('Incorrect data type. Please, try again.');
            } else {
                $db->commit($this->Post);
                $this->Flash->success('The import was successful.');        
            }
        } else {
        
            $this->Flash->error('Failed to import data. Please, try again.');
        
        }
        
        $this->redirect(array('action' => 'index'));
        
    }

}

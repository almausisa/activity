<?php
    App::uses('AppController', 'Controller');

    class PostsController extends AppController {

        public $helpers  = ['Html','Forms'];

        public function index() {

            $this->loadModel('Post');

            #get user id
            $user_id = $this->Auth->user('id');

            $logged_in = $this->Auth->loggedIn();

            if($logged_in){
                $data = $this->Post->getPostLists($user_id);
            }else{
                $data = array();
            }

            $this->set('data', $data);
        }



        function add(){
            #call model to be used
            $this->loadModel('Post');

            #get user id
            $user_id = $this->Auth->user('id');
            
            if($this->request->is('post')){
                $form_data = $this->request->data;
        
                $new_data = array(
                    'Post'=>array(
                        'user_id'=>$user_id,
                        'title'=>$form_data['Post']['title'],
                        'body'=>$form_data['Post']['body']
                    )
                );


                $this->Post->new_post($new_data);

                $this->Flash->success(__('Successfully added new post!'));

                $this->redirect(['action'=>'index']);
            }
        }

        public function view($id = null) {
            #call model to be used
            $this->loadModel('Post');

            

            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }
    
            $data = $this->Post->getPost_byID($id);
            // $post = $this->Post->findById($id);

            if (!$data) {
                throw new NotFoundException(__('Invalid post'));
            }
            $this->set('post', $data);
        }
        

        public function edit($id=null){
            #load model to be used
            $this->loadModel('Post');

            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }
            
            $form_data  = $this->request->data;

            $data = $this->Post->getPost_byID($id);

            // $post = $this->Post->findById($id);
            if (!$data) {
                throw new NotFoundException(__('Invalid post'));
            }
        
            if ($this->request->is(array('post', 'put'))) {
                // $this->Post->id = $id;
                // if ($this->Post->save($this->request->data)) {
                //     $this->Flash->success(__('Your post has been updated.'));
                //     return $this->redirect(array('action' => 'index'));
                // }
                $response = $this->Post->update_post($id, $form_data);

                if($response['status']==1){
                    $this->Flash->success(__('Your post has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to update your post.'));
            }
        
            if (!$this->request->data) {
                $this->request->data = $data;
            }
        }

        function delete($id = null){
            #load model
            $this->loadModel('Post');

            if(!$id){
                throw new NotFoundException(__('Invalid post'));
            }

            $response = $this->Post->remove_post($id);

            if($response['status']==1){
                $this->Flash->success(__('Successfully Removed Post!'));
            }else{
                $this->Flash->error(__('Error Removing Post'));
            }

            return $this->redirect(['action'=>'index']);
        }


        function test() {
            $this->Flash->success(__('hello world'));
        }














    }

?>
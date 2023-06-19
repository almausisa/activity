<?php
    App::uses('AppController','Controller');

    class UsersController extends AppController {
        public $helpers = ['Html','Form'];

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow('add');
        }

        public function index() {
            #load model
            $this->loadModel('User');

            $data['user_data'] = $this->User->getUser_lists();

            $this->set('data', $data);
        }

        function add() {
            #load model
            $this->loadModel('User');

            #get data
            $form_data = $this->request->data;

           
            // echo '<pre>';
            // var_dump($form_data);
            // echo '</pre>';
            // die();

            if($this->request->is('post')){
                #proceed to save information
                $response = $this->User->addNew_userinformation($form_data);

                if($response['status']==1){
                    $this->Flash->success(__('Successfully Added new user'));
                    $this->redirect(['action'=>'index']);
                }
            }
        }
        

        function edit($id = null){

            #load model
            $this->loadModel('User');

            $form_data  = $this->request->data;

            $data = $this->User->getUser_byID($id);

            if(!$id){
                throw new NotFoundException(__('Invalid post'));
            }

            if($this->request->is(array('post','put'))){
                $response = $this->User->update_userInformation($id, $form_data);

                if($response['status']==1){
                    $this->Flash->success(__('Successfully updated user information!'));
                    $this->redirect(['action'=>'index']);
                }
            }

            if (!$this->request->data) {
                $this->request->data = $data;
            }
        }

        function delete($id = null){
            // $form_data  = $this->request->data;

            #load model
            $this->loadModel('User');

            $response = $this->User->remove_userInformation($id);

            if($response['status']==1){
                #if delete successfully
                $this->Flash->success(__('Successfully Removed User'));
            }else{
                $this->Flash->error(__('Error Removing User'));
            }
            
            return $this->redirect(['action'=>'index']);
            

        }
        
        function login(){
            #load model 
            $this->loadModel('User');

            #get value from form
            $form_data  = $this->request->data;

            // echo '<pre>';
            // var_dump($form_data);
            // echo '</pre>';

            // die();

            if($this->request->is('post')){
                if($this->Auth->login()){
                    #login is successfull 
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    #login is not successfull
                    // $this->Session->setFlash(__('Either your username or password is incorrect!'));
                    $this->Flash->error(__('Either your username or password is incorrect!'));
                }
            }
        }

        function logout(){
            #for logging out user
            $this->redirect($this->Auth->logout());
        }

        function test() {
            $this->Flash->success(__('hell world'));
        }






    }
?>
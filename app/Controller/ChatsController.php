<?php

    App::uses('AppController', 'Controller');

    class ChatsController extends AppController {

        public $helpers = ['Html','Form'];

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow('test');
        }

        public function index() {
            // $this->autoRender =false;
            // $this->layout= 'ajax';

            #load models
            $this->loadModel('Conversation');
            $this->loadModel('Message');
            $this->loadModel('User');

            $user_id  = $this->Auth->user('id');

            $data = $this->User->getContact_list($user_id);

            // $test = $this->Message->getMessagesBy_convo(1);


            // $chat = $this->Message->getLastMsg_byID($user_id,'32');

            // $recipients = $this->Recipient->getRecipient($user_id);

            // echo '<pre>';
            // var_dump($test);
            // echo '</pre>';
            // die();

            $contacts = array();

            foreach($data as $key => $contact_val){
                #declare variables

                $msg = "";
                $msg_date = "";
                $convo_id = "";

                $last_msg = $this->Message->getLastMsg_byID($user_id, $contact_val['User']['id']);

                if(!empty($last_msg)){
                    $msg = $last_msg['Message']['message'];
                    $msg_date = $last_msg['Message']['message'];
                    $convo_id = $last_msg['Conversation']['id'];
                    
                }
                
                $tempData = array(
                    'id'=>$contact_val['User']['id'],
                    'convo_id'=>$convo_id,
                    'firstname'=>$contact_val['User']['firstname'],
                    'middlename'=>$contact_val['User']['middlename'],
                    'lastname'=>$contact_val['User']['lastname'],
                    'username'=>$contact_val['User']['username'],
                    'last_message'=>$msg,
                    'created'=>$msg_date
                );

                array_push($contacts, $tempData);
            }

            // echo '<pre>';
            // var_dump($contacts);
            // echo '</pre>';
            // die();

            $this->set('contacts', $contacts);
        }


        function getChat() {
            #set to ajax for getting data only
            $this->layout = 'ajax';
            $this->autoRender = false;

            $form_data  = $this->request->query;

            #load model
            $this->loadModel('Message');

            $response = $this->Message->getMessagesBy_convo($form_data['convo_id']);

            #return data
            echo json_encode($response);
        }

        #for saving message to database
        function sendMessage(){
            #conver to ajax
            $this->layout = 'ajax';
            $this->autoRender = false;

            $response = array();
            
            #get passed values
            $form_data  = $this->request->query;

            // var_dump($form_data);
            // die();

            #load model 
            $this->loadModel('Message');
            $this->loadModel('Conversation');

            $convo_id = $this->Conversation->generateConversation($form_data['from_id'], $form_data['to_id']);

            $response = $this->Message->save_chat($convo_id, $form_data);

            echo json_encode($response);

            // var_dump($convo_id);
            // die();
        }
        
        
        function show_more() {
            $this->layout = 'ajax';
            $this->autoRender = false;

            $form_data  = $this->request->query;

            // var_dump($form_data);
            // die();

            #load model
            $this->loadModel('Message');

            $response = $this->Message->showmoreMessages_byConvo($form_data);

            // var_dump($response);
            // die();
            
            echo  json_encode($response);
        }


        function removeMessage(){
            $this->layout  = 'ajax';
            $this->autoRender = false;

            #load model
            $this->loadModel('Message');

            #get passed data
            $form_data = $this->request->query;

            // echo '<pre>';
            // var_dump($form_data);
            // echo '</pre>';

            // die();

            $response = $this->Message->remove_message($form_data['msg_id']);
            
            echo json_encode($response);
        }






    }

?>
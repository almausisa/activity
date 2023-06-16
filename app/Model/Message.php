<?php
    App::uses('AppModel','Model');


    class Message extends AppModel  {
        
        // public $belongsTo = array(
        //     'Conversation' => array(
        //         'className' => 'Conversation',
        //         'foreignKey' => 'convo_id'
        //     )
        // );

        function getLastMsg_byID($from_id, $to_id){
            $idHolder = array((int)$from_id, (int)$to_id);

            // var_dump($idHolder);
            // die();

            $query = array(
                'fields' => array(
                    'Message.id',
                    'Conversation.id',
                    'Conversation.from_id',
                    'Conversation.to_id',
                    'Message.message',
                    'Message.created'
                ),
                'joins' => array(
                    array(
                        'table' => 'conversations',
                        'alias' => 'Conversation',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Conversation.id = Message.convo_id'
                        )
                    )
                ),
                'conditions' => array(
                    'Conversation.from_id' => $idHolder,
                    'Conversation.to_id' => $idHolder
                ),
                'order' => 'Message.id DESC',
                'limit' => 1
            );
            
            $result = $this->find('first', $query);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';

            // die();
            return $result;
        }


        function getMessagesBy_convo($convo_id) {
            $data = $this->find('all', array(
                'fields'=>array(
                    'Message.id',
                    'Message.sender_id',
                    'Message.message',
                    'Message.created'
                ),
                'conditions'=>array(
                    'Message.convo_id'=>$convo_id
                ),
                'order'=>'Message.id DESC',
                'limit'=>'10'
            ));

            return $data;
        }

        function showmoreMessages_byConvo($data){
            $tempData = $this->find('all', array(
                'fields'=>array(
                    'Message.id',
                    'Message.sender_id',
                    'Message.message',
                    'Message.created'
                ),
                'conditions'=>array(
                    'Message.convo_id'=>$data['convo_id']
                ),
                'order'=>'Message.id DESC',
                'limit'=>'10',
                'offset'=>$data['offset']
            ));

            $return_data = array(
                'new_offset'=>(int)$data['limit'] + (int)$data['offset'],
                'data'=>$tempData
            );


            return $return_data;
        }


        function save_chat($convo_id, $data){
            #load controller  
            $new_data =array(
                'convo_id'=>$convo_id,
                'sender_id'=>$data['from_id'],
                'message'=>$data['message'],
                'created'=>date('Y-m-d H:i:s')
            );

            $this->create(); 
            $this->save($new_data);

            #get new msg id
            $msg_id = $this->getLastInsertID();

            return array(
                'status'=>1,
                'msg_id'=>$msg_id
            );
        }


        #for removing message from database
        function remove_message($msg_id){
            $this->delete($msg_id);

            return array(
                'status'=>'1'
            );
        }
       


        
        
        


    }



?>
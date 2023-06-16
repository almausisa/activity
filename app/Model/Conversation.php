<?php
    App::uses('AppModel','Model');

    class Conversation extends AppModel {

        // public function getConvo_byID($user_id){

        //     $data = $this->find('all');

        //     return $data;
        // }

        // public $hasMany = array(
        //     'Message' => array(
        //         'className' => 'Message',
        //         'foreignKey' => 'convo_id'
        //     )
        // );

        function generateConversation($from_id, $to_id) {
            #check if already on database
            $checkConvo = $this->find('first', array(
                'fields'=>array(
                    'id'
                ),
                'conditions'=>array(
                    'from_id'=> array($from_id, $to_id),
                    'to_id'=> array($from_id, $to_id)
                )
            ));

            if(!empty($checkConvo)){
                #return convo_id
                return $checkConvo['Conversation']['id'];
            }else{
                #save new convo
                $this->Create();
                $this->save(array(
                    'from_id'=>$from_id, 
                    'to_id'=>$to_id
                ));
                #get and return latest generated ID from database
                return $this->getLastInsertID();
            }

        }


    }


?>
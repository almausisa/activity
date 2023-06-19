<?php
    App::uses('AppModel','Model');


    class Post extends AppModel{


        function getPostLists($user_id){
            $data = $this->find('all',array(
                'conditions'=>array(
                    'user_id'=>$user_id
                ),
                'order' => ['id'=>'DESC'],
                'limit' => 5
            ));

            return $data;
        }

        function getPost_byID($id){
            $data = $this->find('first', array('conditions'=>['id'=>$id]
                                              )
                               );
            return $data;
        } 

        function new_post($data){

            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // die();

            $this->create();
            $this->save($data);
        }

        function update_post($id, $data){
            $this->id = $id;
            $this->save($data);


            return array('status' => 1);
        }   

        function remove_post($id){
            $this->delete($id);

            return array('status'=>1);
        }


    }
?>
<?php
    App::uses('AppModel','Model');


    class Post extends AppModel{


        function getPostLists(){
            $data = $this->find('all',array('order' => ['id'=>'DESC'],
                                            'limit' => 5)
                               );

            return $data;
        }

        function getPost_byID($id){
            $data = $this->find('first', array('conditions'=>['id'=>$id]
                                              )
                               );
            return $data;
        } 

        function new_post($data){
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
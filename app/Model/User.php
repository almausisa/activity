<?php
    App::uses('AppModel','Model');
    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class User extends AppModel {

        public $name  = 'User';
        public $displayField = 'name';


        #for user enty validation
        public $validate = array(
            'firstname'=>array(
                'Please enter first name'=>array(
                    'rule'=>'notBlank',
                    'message'=>'Please enter first name'
                )
            ),
            'middlename'=>array(
                'Please enter middle name'=>array(
                    'rule'=>'notBlank',
                    'message'=>'Please enter middle name'
                )
            ),
            'lastname'=>array(
                'Please enter last name'=>array(
                    'rule'=>'notBlank',
                    'message'=>'Please enter last name'
                )
            ),
            'role'=>array(
                'Please select role'=>array(
                    'rule'=>'notBlank',
                    'message'=>'Please select role'
                )
            ),
            'username'=>array(
                'Please enter username'=>array(
                    'rule'=>'isUnique',
                    'message'=>'Please enter username'
                )
                  
            ),
            'password'=>array(
                'Please enter password'=>array(
                    'rule'=>'notBlank',
                    'message'=>'Please enter password'
                )     
            )
        );


        function getUser_lists(){
            $data = $this->find('all');
            return $data;
        }

        function getUser_byID($id){
            $data  = $this->find('first', array('conditions'=>['id'=>$id])
                                );
            return $data;
        }

        function addNew_userinformation($data) {
            $this->create();
            $this->save($data);

            return ['status'=>1];
        }

        function update_userInformation($id, $data){
            $this->id = $id;
            $this->save($data);

            return array('status'=>1);
        }

        function remove_userInformation($id){
            $this->delete($id);

            return array('status'=>1);
        }

        public function beforeSave($options = array()) {
            if (isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
                );
            }
            return true;
        }



        #get list of contacts but not including itself
        function getContact_list($id){
            $conditions = array('id !='=>$id);  

            $data  = $this->find('all',array(
                'conditions'=>$conditions
            ));


            return $data;
        }









    }
?>
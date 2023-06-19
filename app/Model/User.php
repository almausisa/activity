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
            #copy file to variable
            $file = $data['User']['file'];

            #remove file from form
            unset($data['User']['file']);

            $this->create();
            $this->save($data);

            #get last inserted id of user
            $latest_id = $this->getLastInsertID();

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $target = WWW_ROOT . 'img/person/' . $latest_id . '.'. $ext;
            $filePath = $target;
        
            #for moving actual file
            move_uploaded_file($file['tmp_name'], $filePath);

            #re update user file for extension

            $new_data = array('User'=>array(
                'file'=>$ext
            ));

            $this->id = $latest_id;
            $this->save($new_data);

            return ['status'=>1];
        }

        function update_userInformation($id, $data){
            $this->id = $id;
            $this->save($data);

            return array('status'=>1);
        }

        function remove_userInformation($id){
            #get first user information 
            $tempData = $this->find('first', array(
                'conditions'=>array(
                    'User.id'=>$id
                )
            ));

            #remove user from database
            $this->delete($id);

            #also include uploaded file
            $file = new File(WWW_ROOT . 'img/person/' . $id . '.' . $tempData['User']['file']);

            if($file->exists()){
                $file->delete();
            }

            // echo '<pre>';
            // var_dump($file);
            // echo '</pre>';
            // die();

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
        function getContact_list($id, $search){
            $conditions = array('id !='=>$id);  

            $data  = $this->find('all',array(
                'conditions'=>$conditions
            ));

            return $data;
        }

        #for searching contact list
        function search_contacts($user_id, $search){
            $conditions = array(
                'CONCAT(User.firstname, " ", User.lastname) LIKE'=>'%' . $search . '%',
                'not'=>array(
                    'User.id'=>$user_id
                )
            );

            $data = $this->find('all', array(
                'conditions'=>$conditions
            ));

            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';

            // die();

            return $data;
        }







        


    }
?>
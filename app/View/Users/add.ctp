

            <style>

            </style>

            <div class = "card">
                <div class = "card-header">
                    <h5>Add New User</h5>
                </div>
                <div class = "card-body">
                    <?=$this->Form->create('User',array('enctype'=>'multipart/form-data'))?>
                    <?=$this->Form->input('file', array('type'=>'file'))?>
                    <?=$this->Form->input('firstname', ['class'=>'form-control','label'=>'First Name'])?>
                    <?=$this->Form->input('middlename', ['class'=>'form-control','label'=>'Middle Name'])?>
                    <?=$this->Form->input('lastname', ['class'=>'form-control','label'=>'Last Name'])?>

                    <?=$this->Form->input('role',['class'=>'form-control','options'=>['Admin','User','Author']])?>
                    <?=$this->Form->input('username',['class'=>'form-control'])?>
                    <?=$this->Form->input('password',['class'=>'form-control'])?>
                   
                    <?=$this->Form->button('Add New User', ['class'=>'btn btn-success btn-block'])?>

                    <?=$this->Form->end()?>

                
                </div>
            </div>

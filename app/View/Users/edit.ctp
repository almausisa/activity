        <div class="card">
            <div class = "card-header">
                <h5>Update User Information</h5>
            </div>
            <div class="card-body">
                <div class = "card-body">
                    <?=$this->Form->create('User')?>
                    <?=$this->Form->input('id', ['type'=>'hidden'])?>
                    
                    <?=$this->Form->input('firstname', ['class'=>'form-control','label'=>'First Name'])?>
                    <?=$this->Form->input('middlename', ['class'=>'form-control','label'=>'Middle Name'])?>
                    <?=$this->Form->input('lastname', ['class'=>'form-control','label'=>'Last Name'])?>
                    
                    <?=$this->Form->input('role',['class'=>'form-control','options'=>['Admin','User','Author']])?>
                    <?=$this->Form->input('username',['class'=>'form-control'])?>
                    <?=$this->Form->input('password',['class'=>'form-control'])?>
                   

                    <?=$this->Form->button('Update User', ['class'=>'btn btn-success btn-block'])?>

                    <?=$this->Form->end()?>

                
                </div>
            </div>
        </div>

        
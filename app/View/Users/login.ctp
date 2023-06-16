
            <style>

                .card-login {
                    width: 500px;
                    margin: auto;
                    top: 20vh;
                }
            </style>

            <div class="card card-login">
                <div class="card-body">
                    <h5>Login Information</h5>
                    <?=$this->Flash->render('auth')?>
                  
                    <?=$this->Form->create('User')?>
                    <fieldset>

                        <?=$this->Form->input('username', ['class'=>'form-control','placeholder'=>'ex. John','autocomplete'=>'off','required'])?>
                        <?=$this->Form->input('password', ['class'=>'form-control','placeholder'=>'ex. you password','autocomplete'=>'off','required'])?>
                    </fieldset>
                    <?=$this->Form->button('Login', array('class'=>'btn btn-primary btn-block'))?>

                    <?=$this->Form->end()?>
                </div>
            </div>
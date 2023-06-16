<div class="card">
   
    <div class="card-body">
        <h5>User Lists</h5>
        <div class = "row">
            <div class = "col-md-9"></div>
            <div class = "col-md-3 ">
                <a class = "btn btn-primary btn-block" 
                    href = "<?=$this->Html->url(['controller'=>'users','action'=>'add'])?>"
                ><i class="fa-solid fa-user-plus"></i>&nbsp;New User</a>
            </div>

            <!-- table  -->
            <div class = "col-md-12 mt-2">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width = "50"class = "text-center">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class = "text-center" colspan = "2"><i class="fa-solid fa-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count = 1;
                      $role = "";
                        foreach($data['user_data'] as $key => $val){
                            if($val['User']['role']=='0'){
                                $role = 'Admin';
                            }

                            if($val['User']['role']=='1'){
                                $role = 'User';
                            }

                            if($val['User']['role']=='2'){
                                $role = 'Author';
                            }


                        echo '
                            <tr>
                                <td class ="text-center">'. $count .'</td>
                                <td>'. $val['User']['firstname'] .' '. $val['User']['middlename'] .' '. $val['User']['lastname'] . '</td>
                                <td>'. $val['User']['username'] .'</td>
                                <td>'. $role .'</td>
                                <td width = "80" class = "text-center">
                                    <a href = "'. $this->Html->url(['controller'=>'users','action'=>'edit',$val['User']['id']]) .'" >Edit</a>
                                </td>
                                <td width = "80" class = "text-center">
                                   '. $this->Form->postLink('delete', ['action'=>'delete', $val['User']['id']],['confirm'=>'Are you sure you want to remove selected user? Please confirm action']) .'
                                </td>
                            </tr>
                        ';
                            $count++;
                        }
                      ?>
                    </tbody>
                </table>
            </div>
            <!-- table  -->
        </div>
    </div>
</div>
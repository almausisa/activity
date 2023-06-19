<?php

    // var_dump($data);
    // die();

    // echo '<h2>hello world</h2>';

    foreach($contacts as $key => $val){
        $date = strtotime($val['created']);

        $path = 'img/person/' . $val['id']. '.' . $val['file'];

        if(file_exists(WWW_ROOT . $path )){
            $img = $this->Html->image('/img/person/' . $val['id'] . '.' . $val['file'],array(
                'alt'=>'user-img','class'=>'rounded-circle'
            ));
        }else{
            $img = "<img src='https://ptetutorials.com/images/user-profile.png' alt='sunil' class = 'rounded-circle'>";
        }
        
        echo '
        <div class="chat_list" data-to-id = "'. $val['id'] .'" data-convo-id = "'. $val['convo_id'] .'" data-msg-href = "' . $this->Html->url(['action'=>'getChat']) .  '">
            <div class="chat_people">
                <div class="chat_img">
                    '. $img .'
                </div>
                <div class="chat_ib">
                    <h5 class = "contact-name">'. $val['firstname'] .' ' . $val['lastname'] .' <span class="chat_date">'. date('M d',$date) .'</span></h5>

                    <p class = "chat-username">| '. $val['username'].' |</p>
                    <p>'. $val['last_message'] .'</p>
                </div>
            </div>
        </div>
        ';
    }


?>
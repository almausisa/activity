<?php
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
?>



                <div class = "row mt-4">
                    <div class = "col-md-9">
                        <h1 class = "main-title">Blog Posts</h1>
                    </div>

                  
                       <!-- new post -->
                       <div class = "col-md-3">
                            <!-- <button id = "btnNewPost_id" 
                                class = "btn btn-primary btn-sm btn-block"
                                data-modal-href = "posts/modal"
                                data-id =""
                            ><span class ="fas fa-file-alt"></span>&nbsp;New Post</button> -->
                            <a class = "btn btn-primary btn-block"
                                href = "<?=$this->Html->url(['controller'=>'posts','action'=>'add'])?>"
                            ><span class ="fas fa-file-alt"></span>&nbsp;New Post</a>
                        </div>
                        <!-- new post -->
                    
                  
                 
                </div>


                <div class = "posts-container mt-2 px-2">
                    <div id ="postItems_id">
<?php
                    foreach($data as $key => $post_val){
                        echo '
                        <div class = "post-time text-center">
                            <p>'. $post_val['Post']['created'] .'</p>
                        </div>
                        
                        <div class="jumbotron post-box">

                            <div class="btn-group float-right post-option">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                   

                                    <a class="dropdown-item " 
                                        href="'. $this->Html->url(['controller'=>'posts','action'=>'view',$post_val['Post']['id']]) .'"
                                    >View Post</a>

                                    <a class="dropdown-item " 
                                        href="'. $this->Html->url(['controller'=>'posts','action'=>'edit',$post_val['Post']['id']]) .'"
                                    >Update Post</a>

                                    '. $this->Form->postLink('Remove Post',['action'=>'delete',$post_val['Post']['id']],['class'=>'dropdown-item','confirm'=>'Are you sure you want to remove post?']) .'
                                </div>
                            </div>


                            <div class = "row">
                                <div class = "col-md-3 post-image">
                                    '. $this->Html->image('/img/person/tom-cruise.png', array('width'=>'100','height'=>'100')) .'
                                </div>

                                <div class = "col-md-9">
                                    
                                </div>

                                <div class = "col-md-12">
                                    <h1 class="display-4">'. $post_val['Post']['title'] .'</h1>
                                </div>

                                <div class = "col-md-12">'. $post_val['Post']['body'] .'</div>
                            </div>
                            
                        </div>
                        ';
                    }
?>
                    </div>

                    <!-- show more -->
                    <div class = "row">
                        <div class = "col-md-12 text-center mb-4">
                            <a href="posts"
                                data-showmore-href = "posts/show_more"
                                data-limit = "5"
                                data-offset = "5"
                                id = "lnkShowMore_id"
                                hidden
                            >-- show more --</a> 
                        </div>
                    </div>
                    <!-- show more -->

                </div>

           
                <script>

                    //for new post 
                    $(document).ready(function () {
                        $("#btnNewPost_id").click(function (e) { 
                            
                            let modal_href = $(this).attr("data-modal-href"),
                                param = { 'id' : $(this).attr("data-id") };

                                show_modal(modal_href, param);
                        });
                    });

                    //show more 
                    $(document).ready(function () {
                        $("#lnkShowMore_id").click(function (e) { 
                            e.preventDefault();
                            
                            let show_more_href = $(this).attr("data-showmore-href"),
                                params = { 'limit' : $(this).attr("data-limit"),
                                           'offset' : $(this).attr("data-offset") };

                            $("#loadingModal_id").show();

                            $.ajax({
                                type: "GET",
                                url: show_more_href,
                                data: params,
                                success: function (response) {
                                    let return_data  = JSON.parse(response);
                                    let post_data = return_data['post_data'];

                                    //update next offset
                                    $("#lnkShowMore_id").attr("data-limit", return_data['limit']);
                                    $("#lnkShowMore_id").attr("data-offset", return_data['offset']);


                                    // console.log(post_data[0]['Post']['created']);

                                    let post_item = "";

                                    for(x=0;x<post_data.length;x++){
                                        
                                        post_item = post_item + 
                                        "<div class = 'post-time text-center'><p>"+ post_data[x]['Post']['created'] +"</p></div>"+
                                        "<div class = 'jumbotron post-box'>" + 
                                            

                                            "<div class='btn-group float-right post-option'>"+
                                                "<button type='button' class='btn btn-default btn-sm' data-toggle='dropdown' aria-expanded='false'>"+
                                                    "<i class='fa-solid fa-ellipsis-vertical'></i>"+
                                                "</button>"+
                                                "<div class='dropdown-menu'>"+
                                                    "<a class='dropdown-item btnUpdatePost_id'"+
                                                        "href='#'"+
                                                        "data-id = '"+  post_data[x]['Post']['id'] +"'"+
                                                        "data-modal-href = 'posts/post_modal'"+
                                                    ">Update Post</a>"+

                                                    "<a class='dropdown-item btnRemovePost_id' href='#'"+
                                                        "data-id = '"+  post_data[x]['Post']['id'] +"'"+
                                                        "data-delete-href = 'posts/remove_post'"+
                                                    ">Remove Post</a>"+
                                                "</div>"+
                                            "</div>"+

                                            "<div class = 'row'>"+
                                                "<div class = 'col-md-3 post-image'>"+
                                                  '<?php echo $this->Html->image('/img/person/tom-cruise.png', array('width'=>'100','height'=>'100'))  ?>'+
                                                "</div>"+

                                                "<div class = 'col-md-9'>"+
                                                    
                                                "</div>"+

                                                "<div class = 'col-md-12'>"+
                                                    "<h1 class='display-4'>"+ post_data[x]['Post']['title'] +"</h1>"+
                                                "</div>"+

                                                "<div class = 'col-md-12'>"+ post_data[x]['Post']['body'] +"</div>"+
                                            "</div>"+


                                           
                                        "</div>";


                                      
                                    }

                                    $("#postItems_id").append(post_item);

                                    $("#loadingModal_id").hide();

                                }
                            });


                            
                        });
                    });

                    // $('.posts-container').on('scroll', function() {
                    //     if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                    //        //trigger show more
                    //        $("#lnkShowMore_id").trigger("click");
                    //     }
                    // })
                </script>


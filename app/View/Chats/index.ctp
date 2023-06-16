
			<style>
				.container{max-width:1170px; margin:auto;}
				img{ max-width:100%;}
				.inbox_people {
					background: #f8f8f8 none repeat scroll 0 0;
					float: left;
					overflow: hidden;
					width: 40%; border-right:1px solid #c4c4c4;
				}
				.inbox_msg {
					border: 1px solid #c4c4c4;
					clear: both;
					overflow: hidden;
				}
				.top_spac{ margin: 20px 0 0;}


				.recent_heading {float: left; width:40%;}
				.srch_bar {
					display: inline-block;
					text-align: right;
					width: 60%;
				}
				.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

				.recent_heading h4 {
					color: #05728f;
					font-size: 21px;
					margin: auto;
				}
				.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
				.srch_bar .input-group-addon button {
					background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
					border: medium none;
					padding: 0;
					color: #707070;
					font-size: 18px;
				}
				.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

				.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 0 0;}
				.chat_ib h5 span{ font-size:13px; float:right;}
				.chat_ib p{ font-size:14px; color:#989898; margin:auto}
				.chat_ib .chat-username {
					font-size: 11px;
					margin-bottom: 10px;
				}
				.chat_img {
					vertical-align: middle !important;
					float: left;
					width: 11%;
				}
				.chat_ib {
					float: left;
					padding: 0 0 0 15px;
					width: 88%;
				}

				.chat_people{ 
					overflow:hidden; 
					position: relative;
					clear:both;
					margin-bottom: 0px !important;
					font-size: 5px !important;
				}

				.chat-people h5{
					color:red !important;
				}
				.chat_list {
					border-bottom: 1px solid #c4c4c4;
					margin: 0;
					padding: 18px 16px 10px;
				}
				.inbox_chat { height: 550px; overflow-y: scroll;}

				.active_chat{ background:#ebebeb;}

				.incoming_msg_img {
					display: inline-block;
					width: 6%;
				}
				.received_msg {
					display: inline-block;
					padding: 0 0 0 10px;
					vertical-align: top;
					width: 92%;
				}
				.received_withd_msg p {
					background: #ebebeb none repeat scroll 0 0;
					border-radius: 3px;
					color: #646464;
					font-size: 14px;
					margin: 0;
					padding: 5px 10px 5px 12px;
					width: 100%;
				}
				.time_date {
					color: #747474;
					display: block;
					font-size: 12px;
					margin: 8px 0 0;
				}
				.received_withd_msg { width: 57%;}
				.mesgs {
					float: left;
					padding: 30px 15px 0 25px;
					width: 60%;
				}

				.sent_msg p {
					background: #05728f none repeat scroll 0 0;
					border-radius: 3px;
					font-size: 14px;
					margin: 0; color:#fff;
					padding: 5px 10px 5px 12px;
					width:100%;
				}
				.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
				.sent_msg {
					float: right;
					width: 46%;
				}


				.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
				.msg_send_btn {
					background: #05728f none repeat scroll 0 0;
					border: medium none;
					border-radius: 50%;
					color: #fff;
					cursor: pointer;
					font-size: 17px;
					height: 33px;
					position: absolute;
					right: 0;
					top: 11px;
					width: 33px;
				}
				.messaging {
					padding: 0 0 50px 0;
					height: 100vh;
				}
				.msg_history {
					height: 516px;
					overflow-y: auto;
				}


				.contact-name { 
					margin-bottom: 0px !important;
				}

			</style>


			<h3 class=" text-center">Messaging</h3>
			
			<div class="messaging">
				<div class="inbox_msg">
					<div class="inbox_people">
						<!-- for contacts header -->
						<div class="headind_srch">
							<div class="recent_heading">
								<h4>Contacts</h4>
							</div>
							<div class="srch_bar">
							<div class="stylish-input-group">
								<input type="text" class="search-bar"  placeholder="Search" >
								<span class="input-group-addon">
								<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
								</span> </div>
							</div>
						</div>
						<!-- for contacts header -->

						<!-- contact list -->
						<div class="inbox_chat">

						
						

<?php
						foreach($contacts as $key => $val){
							echo '
							<div class="chat_list" data-to-id = "'. $val['id'] .'" data-convo-id = "'. $val['convo_id'] .'" data-msg-href = "' . $this->Html->url(['action'=>'getChat']) .  '">
								<div class="chat_people">
									<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
									<h5 class = "contact-name">'. $val['firstname'] .' ' . $val['lastname'] .' <span class="chat_date">Dec 25</span></h5>

									<p class = "chat-username">| '. $val['username'].' |</p>
									<p>'. $val['last_message'] .'</p>
									</div>
								</div>
							</div>
							';
						}
?>

						</div>
						<!-- contact list -->
						
					</div>

					<div class="mesgs">
						<div class="msg_history">
							<!-- messages are put inside -->
						</div>

						<div class="type_msg">
							<div class="input_msg_write  mt-2">

								<div class="input-group mb-3">
									<input id = "txtMessagebox_id" type="text" class="form-control" aria-describedby="button-addon2">
									<div class="input-group-append">
										<button class="btn btn-primary" 
											type="button" 
											id="btnSend_id"
											data-convo-id = ""
											data-to-id = ""

											<?php
												if($logged_in){
													echo 'data-current-id= "'. $current_user['id'] .'"';
												}else{
													echo 'data-current-id =""';
												}
											?>

										
											data-limit = ""
											data-offset = ""
										><i class="fa-regular fa-paper-plane"></i>&nbsp;Send</button>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
    		</div>

			<script>
                //for textbox enter function
				$(document).ready(function () {
					$("#txtMessagebox_id").keydown(function (e) { 
						if(e.keyCode==13){
							$("#btnSend_id").trigger("click");
						}
					});
				});
			
				//send button click function
				$(document).ready(function () {
					$("#btnSend_id").click(function (e) { 
						let param_list = {
							'from_id' : $(this).attr("data-current-id"),
							'to_id' : $(this).attr("data-to-id"),
							'message' : $("#txtMessagebox_id").val()
						};

						//empty textbox
						$("#txtMessagebox_id").val("");

						send_message(param_list);
					});
				});

				//contacts click function
				$(document).ready(function () {
					$(".chat_list").click(function (e) { 
						$(".chat_list").removeClass('active_chat');
						$(this).addClass('active_chat');

						let data_href = $(this).attr("data-msg-href"),
							params  = { 'convo_id' : $(this).attr("data-convo-id")};

						//update button attributes
						$("#btnSend_id").attr("data-to-id", $(this).attr("data-to-id"));
						$("#btnSend_id").attr("data-convo-id", $(this).attr("data-convo-id"));
						$("#btnSend_id").attr("data-limit","10");
						$("#btnSend_id").attr("data-offset","10");


						getMessages(params);

						autoScrolldown();
					});
				});

				//for getting messages function
				function getMessages(params){
					$("#loadingModal_id").show();

					$.ajax({
						type: "GET",
						url: 'chats/getChat',
						data: params,
						success: function (response) {
							let return_data = JSON.parse(response);
							let current_id = $("#btnSend_id").attr("data-current-id");

							if(return_data == ""){
								location.href = "activity/users/login";
							}


							console.log(return_data);

							$("#loadingModal_id").hide();

							$(".msg_history").empty();

							for(x=0;x<return_data.length;x++){
								if(return_data[x]['Message']['sender_id']==current_id){
									// alert("pareho hra!");
									let msg = "<div class = 'outgoing_msg'>"+
													"<div class = 'sent_msg'>"+
														"<p>"+ return_data[x]['Message']['message'] +"</p>"+
														"<span class = 'time_date'>"+ return_data[x]['Message']['created'] +"</span>"+
													"</div>"+
											  "</div>";
									$(".msg_history").prepend(msg);
								}else{
									let msg = ""+
										"<div class = 'incoming_msg'>" +
											"<div class = 'received_msg'>"+
												"<div class = 'received_withd_msg'>"+
													"<p>"+ return_data[x]['Message']['message'] +"</p>"+
													"<span class = 'time_date'>"+ return_data[x]['Message']['created'] +"</span>"+
												"</div>"+
											"</div>" +
										"</div>" +
										"";
									$(".msg_history").prepend(msg);

								}
								
							}

							
							

						}
					});
				}

				//for sending message
				function send_message(params){
					//get message from text box
					$("#loadingModal_id").show();

					$.ajax({
						type: "GET",
						url: "chats/sendMessage",
						data: params,	
						success: function (response) {
							let return_data  = JSON.parse(response);

							//hide loading form
							$("#loadingModal_id").hide();

							if(return_data['status']=='1'){
								let msg = "<div class = 'outgoing_msg'>"+
												"<div class = 'sent_msg'>"+
													"<p>"+ params['message'] +"</p>"+
													"<span class = 'time_date'>Now</span>"+
												"</div>"+
											"</div>";
								$(".msg_history").append(msg);

								autoScrolldown();
							}else{
								alert("Error sending message!");
							}
						}
					});
				}

				//for message container scroll function
				$(document).ready(function () {
					$(".msg_history").scroll(function () { 
						let pos = $(".msg_history").scrollTop();

						if(pos == 0){
							let params = {
								'limit' : $('#btnSend_id').attr("data-limit"),
								'offset' : $('#btnSend_id').attr("data-offset"),
								'convo_id' : $('#btnSend_id').attr("data-convo-id")
							};

							loadMore(params);
						}
					});	
				});

				function autoScrolldown(){
					$('.msg_history').animate({
						scrollTop: $('.msg_history').get(0).scrollHeight
					}, 400);
				}

				function loadMore(params){

					$.ajax({
						type: "GET",
						url: "chats/show_more",
						data: params,
						success: function (response) {
							let return_data = JSON.parse(response);
							let current_id = $("#btnSend_id").attr("data-current-id");

							let msg_data = return_data['data'];
							
							// for(x=0;x<msg_data.length;x++){
							// 	alert(msg_data[x]['Message']['message']);
							// }
							// let test = return_data['new_offset'];
							// console.log(test);
							// alert(return_data['new_offset']);
							if(msg_data.length !=0){
								//assign new offset to button 
								$("#btnSend_id").attr("data-offset", return_data['new_offset']);


								for(x=0;x<msg_data.length;x++){
									if(msg_data[x]['Message']['sender_id']==current_id){
										// alert("pareho hra!");
										let msg = "<div class = 'outgoing_msg'>"+
														"<div class = 'sent_msg'>"+
															"<p>"+ msg_data[x]['Message']['message'] +"</p>"+
															"<span class = 'time_date'>"+ msg_data[x]['Message']['created'] +"</span>"+
														"</div>"+
												"</div>";
										$(".msg_history").prepend(msg);
									}else{
										let msg = ""+
											"<div class = 'incoming_msg'>" +
												"<div class = 'received_msg'>"+
													"<div class = 'received_withd_msg'>"+
														"<p>"+ msg_data[x]['Message']['message'] +"</p>"+
														"<span class = 'time_date'>"+ msg_data[x]['Message']['created'] +"</span>"+
													"</div>"+
												"</div>" +
											"</div>" +
											"";
										$(".msg_history").prepend(msg);

									}
								}
							}
						}
					});
				}








			</script>
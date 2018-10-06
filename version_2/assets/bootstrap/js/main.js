// $.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;

	checkNotificationOfProjectAssign();
	checkAcceptOrDeclineOfUser();
	// checkSeenOfProjectAssign();

	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
		if($('#wireframe-box').hasClass('wireframe-toolbox')){
			if($('#wireframe-box').hasClass('wireframe-toolbox-expand')){
				$('#wireframe-box').removeClass('wireframe-toolbox-expand');
			}else{
				$('#wireframe-box').addClass('wireframe-toolbox-expand');
			}
		}
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	$('#startWireframes').click(function(){
		// $('body').addClass('open');
		$('#wireframe-box').addClass('wireframe-toolbox wireframe-toolbox-expand');
		$('#startWireframes').prop('disabled', true);
	});
	
	$(window).on('load', function() { // makes sure the whole site is loaded 
  		$('#status').fadeOut(); // will first fade out the loading animation 
  		$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  		$('body').delay(350).css({'overflow':'visible'});
  		setTimeout(hideErrorBox, 4000);
	})
	function hideErrorBox(){
		$('.login-alert').fadeOut('slow');
    	$('.login-alert').html("");
	}
	var bodyID = $('body').attr('id');
	if(bodyID == "projectPage"){
	}
    $("#projectStart").datepicker({
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#projectEnd").datepicker("option","minDate", selected)
        }
    });
    $("#projectEnd").datepicker({ 
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#projectStart").datepicker("option","maxDate", selected)
        }
    });
    $("#user-email").keyup(function() {
    	var value = $('#user-email').val();
    	$('#user-email-show').hide();
    	$('#user-email-show').text("");
    	if(value != ""){
    		$.ajax({
				url:baseURL+'assign/get_user_data',
				method: 'post',
				type: 'post',
     			data: {value: value},
     			dataType: 'json',
				success: function(response){
					if(response.length > 0){
						$('#user-email-show').show();
						for(var i = 0; i < response.length; i++){
							if(response[i]['path'] == null){
								var srcImage = 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg';
							}else{
								var srcImage = response[i]['path'];
							}
							$('#user-email-show').append('<div class="main-user-email clearfix" onclick="printUserEmail(this, '+ response[i]['u_id'] +')"><img src="'+ srcImage +'" class="user-avatar email-image"><span>'+ response[i]['u_fname'] +' '+ response[i]['u_lname']+'</span><p>'+ response[i]['u_email'] + '</p></div>');
						}
						console.log(response);
					}
     			}
   			});	
    	}
	});
	$("#projectName").change(function() {
    	var value = $('#projectName').val();
    	$.ajax({
			url:baseURL+'assign/get_task_type',
			method: 'post',
			type: 'post',
     		data: {value: value},
     		dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.length > 0){
					for(var i = 0; i < response.length; i++){	
						var taskChecker = response[i]['t_type'];
						if(taskChecker == 1){
							taskChecker = "Wireframe"
						}else if(taskChecker == 2){
							taskChecker = "Mockup"	
						}else{
							taskChecker = "Prototype"
						}
						$('#taskType').append('<option value="'+ response[i]['t_type'] +'">'+ taskChecker +'</option>');
					}
				}else{
					$('#taskType').val("");
				}
			}
   		});	
	});
	//Disable enter key inorder to submit form
	$("input").keypress(function (evt) {
		var keycode = evt.charCode || evt.keyCode;
		if (keycode  == 13) { //Enter key's keycode
			return false;
		}
	});
});
	function printUserEmail(e, id){
		$('#user-email-id').attr('value', id);
		$('#user-email').val(e.getElementsByTagName("p")[0].innerHTML);
		$('#user-email-show').hide();
	}

	function checkSeenOfProjectAssign(){
		// $.ajax({
		// 	url:baseURL+'user/get_seen_project_notification',
		// 	method: 'post',
		// 	type: 'post',
  //    		dataType: 'json',
		// 	success: function(response){
		// 		if(response.length > 0){
		// 			var seen = 0;
		// 			$('#dropdown-notification p.red').text("You Have " + response.length + " Notification");
		// 			if(response.length > 3){
		// 				notificationLength = 3;
		// 			}else{
		// 				notificationLength = response.length;
		// 			}
		// 			// for(var i = 0; i < notificationLength; i++){
		// 			// 	if(response[i]['seen'] == 0){
		// 			// 		seen++;
		// 			// 	}
		// 			// 	var checkImage = "";
		// 			// 	var taskType = "";
		// 			// 	if(response[i]['path'] == null){
		// 			// 		checkImage = "http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg";
		// 			// 	}else{
		// 			// 		checkImage = response[i]['path'];
		// 			// 	}
		// 			// 	if(response[i]['t_type'] == 1){
		// 			// 		taskType = "Wireframe";
		// 			// 	}else if(response[i]['t_type'] == 1){
		// 			// 		taskType = "Mockup";
		// 			// 	}else{
		// 			// 		taskType = "Prototype";
		// 			// 	}
		// 			// 	if(response[i]['seen'] == 0){
		// 			// 		notifyColor = "#eee";
		// 			// 	}
		// 			// 	else{
		// 			// 		notifyColor = "";
		// 			// 	}
		// 			// 	$('#main-notifier').append('<div class="notify" style="background-color:'+ notifyColor +'">\
		// 			// 									<a class="dropdown-item media" href="'+baseURL+'user/get_single_notification/'+ response[i]['a_id'] +'">\
		// 			// 										<span class="photo media-left">\
		// 			// 											<img src="'+checkImage+'">\
		// 			// 										</span>\
		// 			// 										<span class="message media-body">\
		// 			// 											<span class="name float-left">'+response[i]['u_fname'] + " " + response[i]['u_lname'] + " (" + response[i]['u_email'] + ')\
		// 			// 										</span>\
		// 			// 										<p>Assign You the '+ taskType +' of ' + response[i]['p_name'] +'</p>\
		// 			// 										</span>\
		// 			// 									</a>\
		// 			// 									<p class="text-center">\
		// 			// 										<span class="span-btn">\
		// 			// 											<a href="#">Accept</a>\
		// 			// 										</span> &nbsp;\
		// 			// 										<span class="span-btn">\
		// 			// 											<a href="#">Decline</a>\
		// 			// 										</span>\
		// 			// 									</p>\
		// 			// 								</div>');
		// 			// }
		// 			$('#message-count').text(response.length);
		// 		}else{
		// 			$('#message-count').text(0);
		// 			$('#dropdown-notification p.red').text("You have No Mails");
		// 		}
		// 		console.log(response);
		// 	}
  //  		});	
	}

	function checkNotificationOfProjectAssign(){
		$('#main-notifier').html("");
		$('#count').html("");
		$.ajax({
			url:baseURL+'user/get_detail_project_notification',
			method: 'post',
			type: 'post',
     		dataType: 'json',
			success: function(response){
				if(response.length > 0){
					var seen = 0;
					$('#dropdown-notification p.red').text("You Have " + response.length + " Notification");
					if(response.length > 3){
						notificationLength = 3;
					}else{
						notificationLength = response.length;
					}
					for(var i = 0; i < notificationLength; i++){
						if((response[i]['seen'] == 0) && (response[i]['a_accept'] == 0)){
							seen++;
						}
						var acceptCheck = "";
						var checkImage = "";
						var taskType = "";
						if(response[i]['path'] == null){
							checkImage = "http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg";
						}else{
							checkImage = response[i]['path'];
						}
						if(response[i]['t_type'] == 1){
							taskType = "Wireframe";
						}else if(response[i]['t_type'] == 1){
							taskType = "Mockup";
						}else{
							taskType = "Prototype";
						}
						if(response[i]['seen'] == 0){
							notifyColor = "#eee";
						}
						else{
							notifyColor = "";
						}
						// if(response[i]['a_accept'] == 0){
						// 	acceptCheck = '<p class="text-center">\
						// 									<span class="span-btn">\
						// 										<a href="#" onclick="acceptNotification('+response[i]['a_id']+')">Accept</a>\
						// 									</span> &nbsp;\
						// 									<span class="span-btn">\
						// 										<a href="#" onclick="declineNotification('+response[i]['a_id']+')">Decline</a>\
						// 									</span>\
						// 								</p>';
						// }else if(response[i]['a_accept'] == 1){
						// 	acceptCheck = '<p class="text-center">\
						// 									<span class="span-btn" style="opacity:0.7">\
						// 										Accepted\
						// 									</span> &nbsp;\
						// 									<span class="span-btn" >\
						// 										<a href="#" onclick="declineNotification('+response[i]['a_id']+')">Decline</a>\
						// 									</span>\
						// 								</p>';
						// }else if(response[i]['a_accept'] == 2){
						// 	acceptCheck = '<p class="text-center">\
						// 									<span class="span-btn" style="opacity:1">\
						// 										<a href="#" onclick="acceptNotification('+response[i]['a_id']+')">Accept</a>\
						// 									</span> &nbsp;\
						// 									<span class="span-btn" style="opacity:0.7">\
						// 										Declined\
						// 									</span>\
						// 								</p>';
						// }

						$('#main-notifier').append('<div class="notify" style="background-color:'+ notifyColor +'">\
														<a class="dropdown-item media" href="'+baseURL+'user/get_single_notification/'+ response[i]['a_id'] +'">\
															<span class="photo media-left">\
																<img src="'+checkImage+'">\
															</span>\
															<span class="message media-body">\
																<span class="name float-left">'+response[i]['u_fname'] + " " + response[i]['u_lname'] + " (" + response[i]['u_email'] + ')\
															</span>\
															<p>Assign You the '+ taskType +' of ' + response[i]['p_name'] +'</p>\
															</span>\
														</a>\
													</div>');
					}
					$('#count').text(seen);
				}else{
					$('#count').text(0);
					$('#dropdown-notification p.red').text("You have No Mails");
				}
				console.log(response);
			}
   		});	
	}

	function checkAcceptOrDeclineOfUser(){
		$.ajax({
			url:baseURL+'user/get_accept_decline_assign',
			method: 'post',
			type: 'post',
     		dataType: 'json',
     		success: function(response){
     			if(response.length > 0){
     				$('#main-message-notifier').html("");
     				$('#message-dropdown-notification p.red').text("You Have " + response.length + " Notification");
     				for(var i = 0; i < response.length; i++){
     					var acceptCheck = "";
     					var seen = 0;
     					var taskType = "";
     					var backgroundColor = "";
     					if(response[i]['a_by_seen'] == 0){
     						seen++;
     						backgroundColor = "#eee";
     					}else if(response[i]['a_by_seen'] == 1){
     						backgroundColor = "#fff";
     					}
     					if(response[i]['t_type'] == 1){
							taskType = "Wireframe";
						}else if(response[i]['t_type'] == 1){
							taskType = "Mockup";
						}else{
							taskType = "Prototype";
						}
						if(response[i]['a_accept'] == 1){
							acceptCheck = "Accepted";
						}else if(response[i]['a_accept'] == 2){
							acceptCheck = "Declined";
						}else{
							acceptCheck = "";
						}
     					$('#main-message-notifier').append('<div class="notify" style="background-color:'+backgroundColor+'">\
														<a class="dropdown-item media" href="#">\
														<span class="message media-body">\
															<span class="name float-left">'+response[i]['u_fname'] + " " + response[i]['u_lname'] + " (" + response[i]['u_email'] + ')\
															</span>\
															<p>'+acceptCheck +' the ' + taskType +' of ' + response[i]["p_name"] +'</p>\
														</span>\
														</a>\
													</div>');
     				}
     				$('#message-count').text(seen);
     			}else{
     				$('#message-count').text('0');
     				$('#message-dropdown-notification p.red').text("You Have No Notification");
     			}
     			console.log(response);
     		}
		});
	}
	$('#notify-box').click(function(){
		$id = $(this).attr('value');
		window.location = baseURL + 'user/get_single_notification/' + $id;
	});

	function acceptNotification(id , refresh){
		$.ajax({
			url:baseURL+'assign/accept_notification/'+id,
			method: 'post',
			type: 'post',
     		dataType: 'json',
			success: function(response){
				if(response == true){
					checkNotificationOfProjectAssign();
				}else{
					alert("false");
				}
				console.log(response);
			}
		});
		if(refresh == 1){
			location.reload();
		}
	}

	function declineNotification(id, refresh){
		$.ajax({
			url:baseURL+'assign/decline_notification/'+id,
			method: 'post',
			type: 'post',
     		dataType: 'json',
			success: function(response){
				if(response == true){
					checkNotificationOfProjectAssign();
				}else{
					alert("false");
				}
				console.log(response);
			}
		});
		if(refresh == 1){
			location.reload();
		}
	}
	$('#message-notifier').click(function(){
		if($('#message-notifier').attr('aria-expanded') === "true") {
			$('#main-message-notifier').html("");
  		}else{
			$.ajax({
				url:baseURL+'user/message_assign_by',
				method: 'post',
				type: 'post',     		
				success: function(response){
					if(response == true){
						checkAcceptOrDeclineOfUser();
					}
					console.log(response);
				}
			});
  		}
  	});
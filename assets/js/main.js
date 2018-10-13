// $.noConflict();

jQuery(document).ready(function($) {
    $(document).click(function(e){
        var targetId = $(e.target).attr('id');
        console.log(targetId);
        if((targetId == 'hideShowDropDown') || (targetId == 'showUserName')){
            $('.user-menu').fadeIn();
        }else{
            $('.user-menu').fadeOut();
        }
    });
    var bodyId = $('body').attr('id');
    if(bodyId == "project-page"){
        loadAllProjectsFromDatabase();
    }else if(bodyId == 'task-page'){
        loadAllTasksFromDatabase();
    }else if(bodyId == 'assign-page'){
        getProjectNameHavingTask();
        getAllAssignWithDatabase();
    }
    // Written by Arslan
    $('#updateName').click(function(){
      var firstName = $('#f-name').val();
      var lastName = $('#l-name').val();
      $.ajax({
        url:baseURL+'setting/changeName',
        method: 'post',
        type: 'post',
          data: {firstName: firstName, lastName: lastName},
          dataType: 'json',
        success: function(response){
          console.log(response);
          if(response['code'] == 1){
            errorBox(response['message']);
          }else if(response['code'] == 2){
            successBox(response['message']);
          }
         }
        }); 
      
    });

    $('#updatePassword').click(function(){
      var currpass = $('#current-pass').val();
      var newpass = $('#new-password').val();
      var confpass = $('#con-password').val();
      $.ajax({
        url:baseURL+'setting/changePassword',
        method: 'post',
        type: 'post',
          data: {currpass: currpass, newpass: newpass, confpass:confpass},
          dataType: 'json',
        success: function(response){
          console.log(response);
          if(response['code'] == 1){
            errorBox(response['message']);
          }else if(response['code'] == 2){
            successBox(response['message']);
            emptyChangePassword();
          }else if(response['code'] == 3){
            errorBox(response['message']);
          }
         }
        });
    });
	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;

	checkNotificationOfProjectAssign();
	checkAcceptOrDeclineOfUser();
	// checkSeenOfProjectAssign();

	$('#btnLogIn').click(function(){
    showPreloader();
    $('#loginErrorCustom').html("");
    $('#loginErrorCustom').hide();
    var email = $('#user-name').val();
    var password = $('#user-password').val();
    $.ajax({
     url:baseURL+'login/login',
     method: 'post',
     type: 'post',
     data: {email: email, password:password},
     dataType: 'json',
     success: function(response){
      console.log(response);
      if(response.code == 1){//validation error
        $('#loginErrorCustom').fadeIn('slow');
        $('#loginErrorCustom').append(response.message);
      }else if(response.code == 2){//login
        window.location.href = baseURL+'user/index';
      }else if(response.code == 3){//email not verify
        $('#loginErrorCustom').fadeIn('slow');
        $('#loginErrorCustom').append(response.message);
      }else{
        var cookieValue = parseInt($.cookie("test"));
        cookieValue += 1;
        $.cookie("test", cookieValue);
        $('#loginErrorCustom').fadeIn('slow');
        $('#loginErrorCustom').append(response.message);
        if(cookieValue == "3"){
            $('#loginErrorCustom').fadeIn(10000);
            $('#loginErrorCustom').append("Button is Disabled For 10 Second");
            $('#btnLogIn').prop('disabled', true);
            setTimeout(function(){
            $('#btnLogIn').prop('disabled', false);
          }, 10000);
          $.cookie("test", 0);
        }
      }
      $('#user-name').val("");
      $('#user-password').val("");
      hidePreloader();
     }
   });
  });

	$('#btnRegister').click(function(){
    showPreloader();
    $('#signUpError').html("");
    $('#signUpError').hide();
    var firstName = $('#first-name').val();
    var lastName = $('#last-name').val();
    var email = $('#email-name').val();
    var pass = $('#password').val();
    var conPass = $('#confirm-password').val();
    $.ajax({
     url:baseURL+'register/signup',
     method: 'post',
     type: 'post',
     data: {firstName: firstName, lastName:lastName, email:email, pass:pass, conPass:conPass},
     dataType: 'json',
     success: function(response){
      console.log(response);
      if(response.code == 1){//validation error
       $('#signUpError').fadeIn('slow');
       $('#signUpError').append(response.message);
      }else if(response.code == 2){//confirm email send
        $('#signUpError').fadeIn('slow');
        $('#signUpError').append(response.message);
      }else if(response.code == 3){//error in email send
        $('#signUpError').fadeIn('slow');
        $('#signUpError').append(response.message);
      }
      hidePreloader();
     }
   });
  });
	
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
        
    //add project
    $('#addProject').click(function(){
       showPreloader();
       var projectName = $('#projectName').val();
       var projectType = $('#projectType').val();
       var projectStart = $('#projectStart').val();
       var projectEnd = $('#projectEnd').val();
       var supervisor = $('#user-email-id').val();
       var projectDetails = $('#projectDetails').val();
       $.ajax({
        url:baseURL+'project/add_project',
        method: 'post',
        type: 'post',
        data: {projectName: projectName, projectType:projectType, projectStart:projectStart, projectEnd:projectEnd, supervisor:supervisor, projectDetails:projectDetails},
        dataType: 'json',
        success: function(response){
            console.log(response);
            if(response.code == 1){
                //validation error
                errorBox(response.message);
            }else if(response.code == 2){
                //successfully add
                successBox(response.message);
                emptyAllProjectFields();
                loadAllProjectsFromDatabase();
            }else{
                //error in inserting
                console.log('else');
            }
            hidePreloader();
        }
       });
    });
    
    //add task
    $('#addTask').click(function(){
       showPreloader();
       var projectName = $('#projectName').val();
       var TaskType = $('#taskType').val();
       var projectStart = $('#projectStart').val();
       var projectEnd = $('#projectEnd').val();
       var taskDetail = $('#taskDetail').val();
       $.ajax({
        url:baseURL+'task/add_task',
        method: 'post',
        type: 'post',
        data: {projectName: projectName, TaskType:TaskType, projectStart:projectStart, projectEnd:projectEnd, taskDetail:taskDetail},
        dataType: 'json',
        success: function(response){
            if(response.code == 1){
                //validation error
                errorBox(response.message);
            }else if(response.code == 2){
                //successfully add
                successBox(response.message);
                emptyAllTaskFields();
                loadAllTasksFromDatabase();
            }else{
                //error in inserting
                console.log('else');
            }
            hidePreloader();
        }
       });
    });
    
    //add Assign
    $('#addAssign').click(function(){
       showPreloader();
       var userEmailId = $('#user-email-id').val();
       var projectName = $('#projectName').val();
       var taskType = $('#taskType').val();
       var projectStart = $('#projectStart').val();
       var projectEnd = $('#projectEnd').val();
       var assignDetail = $('#assignDetail').val();
       $.ajax({
        url:baseURL+'assign/add_assign',
        method: 'post',
        type: 'post',
        data: {userEmailId: userEmailId, projectName:projectName, taskType:taskType, projectStart:projectStart, projectEnd:projectEnd, assignDetail:assignDetail},
        dataType: 'json',
        success: function(response){
            console.log(response);
            if(response.code == 1){
                //validation error
                errorBox(response.message);
            }else if(response.code == 2){
                //successfully add
                successBox(response.message);
            }else{
                //error in inserting
                console.log('else');
            }
            hidePreloader();
        }
       });
    });
});

function errorBox(error){
    $('#error-box').fadeIn();
    $('#error-box').addClass('alert-danger');
    $('#error-box').append(error);
    setTimeout(fadeOutError, 3000);
}

function fadeOutError(){
    $('#error-box').fadeOut();
    $('#error-box').removeClass('alert-danger');
    $('#error-box').html('');
}

function successBox(success){
    $('#error-box').fadeIn();
    $('#error-box').addClass('alert-success');
    $('#error-box').append(success);
    setTimeout(fadeOutSuccess, 3000);
}

function fadeOutSuccess(){
    $('#error-box').fadeOut();
    $('#error-box').removeClass('alert-success');
    $('#error-box').html('');
}

function emptyAllProjectFields(){
    $('#projectName').val('');
    $('#projectType').val('');
    $('#projectStart').val('');
    $('#projectEnd').val('');
    $('#user-email-id').val('');
    $('#projectDetails').val('');
    $('#user-email').val('');
}

function emptyAllTaskFields(){
    $('#projectName').val('');
    $('#taskType').val('');
    $('#projectStart').val('');
    $('#projectEnd').val('');
    $('#taskDetail').val('');
}

function emptyChangePassword(){
  $('#current-pass').val('');
  $('#new-password').val('');
  $('#confirm-password').val('');
}

function loadAllProjectsFromDatabase(){
    $.ajax({
        url:baseURL+'project/get_all_project',
        dataType: 'json',
        success: function(response){
            for(var i = 0; i < response.length; i++){
                $('#project-details-table-tbody').append('<tr><td>' + (i+1) +'</td><td>' + response[i]['p_id'] + '</td><td>'+response[i]['p_name']+'</td><td>'+response[i]['p_type']+'</td><td>'+response[i]['p_start']+'</td><td>'+response[i]['p_end']+'</td><td>'+response[i]['u_email']+'</td><td><span onclick="getProjectById('+response[i]['p_id']+')" class="tweak">View</span> | <span onclick="deleteProjectById('+response[i]['p_id']+')" class="tweak">Delete</span></td</tr>');
            }
            hidePreloader();
        }
    });
}

function loadAllTasksFromDatabase(){
    $('#projectName').val('');
    $('#task-details-table-tbody').html('');
    $.ajax({
        url:baseURL+'task/get_all_task',
        dataType: 'json',
        success: function(response){
            console.log(response);
            for(var i = 0; i < response['project_name'].length; i++){
                $('#projectName').append('<option value="'+response['project_name'][i].p_id+'">'+response['project_name'][i].p_name+'</option>')
            }
            for(var i = 0; i < response['task_data'].length; i++){
                var taskType = response['task_data'][i]['t_type'];
                var taskName = '';
                if(taskType == 1){
                    taskName = 'Wireframe';
                }else if(taskType == 2){
                    taskName = 'Mockup';
                }else{
                    taskName = 'Prototype';
                }
                $('#task-details-table-tbody').append('<tr><td>' + (i+1) +'</td><td>' + response['task_data'][i]['t_id'] + '</td><td>'+response['task_data'][i]['p_name']+'</td><td>'+taskName+'</td><td>'+response['task_data'][i]['t_start']+'</td><td>'+response['task_data'][i]['t_end']+'</td><td><span onclick="getProjectById('+response['task_data'][i]['t_id']+')" class="tweak">View</span> | <span onclick="deleteProjectById('+response['task_data'][i]['t_id']+')" class="tweak">Delete</span></td</tr>');
            }
            hidePreloader();
        }
    });
}

function getProjectNameHavingTask(){
    $('#projectName').val('');
    $.ajax({
        url:baseURL+'assign/get_project_name_having_task',
        dataType: 'json',
        success: function(response){
            for(var i = 0; i < response.length; i++){
                $('#projectName').append('<option value="'+response[i].p_id+'">'+response[i].p_name+'</option>')
            }
        }
    });
}

function getAllAssignWithDatabase(){
    $('#assign-details-table-tbody').html('');
    $.ajax({
        url:baseURL+'assign/get_all_task',
        dataType: 'json',
        success: function(response){
            for(var i = 0; i < response['assign_work'].length; i++){
                var taskType = response['assign_work'][i]['t_type'];
                var status = response['assign_work'][i]['a_status'];
                var taskName = '';
                var statusName = '';
                if(taskType == 1){
                    taskName = 'Wireframe';
                }else if(taskType == 2){
                    taskName = 'Mockup';
                }else{
                    taskName = 'Prototype';
                }
                if(status == 0){
                    statusName = "Pending";
                }else if(status == 1){
                    statusName = "Accepted";
                }else{
                    statusName = "Rejected"
                }
                $('#assign-details-table-tbody').append('<tr><td>' + (i+1) +'</td><td>' + response['assign_work'][i]['u_email'] + '</td><td>'+response['assign_work'][i]['p_name']+'</td><td>'+taskName+'</td><td>'+response['assign_work'][i]['a_start']+'</td><td>'+response['assign_work'][i]['a_end']+'</td><td>'+statusName+'</td><td><span onclick="getProjectById('+response['assign_work'][i]['t_id']+')" class="tweak">View</span> | <span onclick="deleteProjectById('+response['assign_work'][i]['t_id']+')" class="tweak">Delete</span></td</tr>');
            }
            hidePreloader();
            hidePreloader();
        }
    });
}
function getProjectById(id){
    
}
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
                            console.log(response);
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
				// console.log(response);
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
		$('#main-message-notifier').html("");
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
  	});

	function showPreloader(){
   		$('#preloader').show();
    	$('#status').show();
  	}

  	function hidePreloader(){
    	$('#preloader').hide();
     	$('#status').hide();
     	setTimeout(loginErrorFunction, 4000);
     	setTimeout(myFunction, 4000);
  	}

  	function loginErrorFunction(){
    	$('#loginErrorCustom').slideUp('slow');
    	$('#loginErrorCustom').html("");
  	}

  	function myFunction(){
    	$('#signUpError').slideUp('slow');
    	$('#signUpError').html("");
  	}

  	$(document).ready(function(){
  $(window).on('load', function() { // makes sure the whole site is loaded 
      $('#status').fadeOut(); // will first fade out the loading animation 
      $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
      $('body').delay(350).css({'overflow':'visible'});
  })
  setTimeout(loginErrorActivation, 4000);
  function loginErrorActivation(){
    $('#loginError').slideUp('slow');
    $('#loginError').html("");
  }
});

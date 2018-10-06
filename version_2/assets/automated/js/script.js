$(document).ready(function(){
  $(window).on('load', function() { // makes sure the whole site is loaded 
      $('#status').fadeOut(); // will first fade out the loading animation 
      $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
      $('body').delay(350).css({'overflow':'visible'});
  })
  setTimeout(loginErrorActivation, 4000);
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
  function myFunction(){
    $('#signUpError').slideUp('slow');
    $('#signUpError').html("");
  }
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
  function loginErrorFunction(){
    $('#loginErrorCustom').slideUp('slow');
    $('#loginErrorCustom').html("");
  }
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
  function loginErrorActivation(){
    $('#loginError').slideUp('slow');
    $('#loginError').html("");
  }
});

$.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );
});

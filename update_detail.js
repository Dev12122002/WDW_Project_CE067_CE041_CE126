$('document').ready(function(){

    $('#back').on('click',function(){
        window.location.replace("http://localhost/book_store_login/project/myprofile.php");
    });
    var username = $('#username').val();
     var email = $('#email').val();
     var pwd = $('#password').val();
     var fullname = $('#fullname').val();
     var country = $('#country').val();
    var username_state = true;
    var email_state = true;
    var pwd_state = true;
    var fullname_state = true;
    var country_state = true;
    var x;
    

    $('#for_pass').on('click',function(){
        
        window.location.replace("http://localhost/book_store_login/project/forgot_password.php");
    });

    $('#username').on('blur', function(){
      username = $('#username').val();
      x = document.getElementById("username");
     if (username == '') {
        username = x.defaultValue;
        // username = $('#username').defaultValue;
         return;
     }

     if(username == x.defaultValue){
         username_state = true;
        $('#username').parent().removeClass();
        $('#username').parent().addClass("form_success");
        $('#username').siblings("i").removeClass("fas fa-sad-tear");
        $('#username').siblings("i").addClass("fas fa-grin-beam");
        $('#username').siblings("span").text('Username available');
        setTimeout(function() {
           $('#username').siblings("span").text('');
         }, 3000);
         return;
     }
     $.ajax({
       url: 'update_detail.php',
       type: 'post',
       data: {
           'username_check' : 1,
           'username' : username,
       },
       success: function(response){

        if(response == 'invalid'){
            username_state = false;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_error");
             $('#username').siblings("i").removeClass("fas fa-grin-beam");
             $('#username').siblings("i").addClass("fas fa-sad-tear");
             $('#username').siblings("span").text('Sorry...Invalid Username (Special Char)');
             setTimeout(function() {
                $('#username').siblings("span").text('');
              }, 3000);
        }
         else if (response == 'taken' ) {
             username_state = false;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_error");
             $('#username').siblings("i").removeClass("fas fa-grin-beam");
             $('#username').siblings("i").addClass("fas fa-sad-tear");
             $('#username').siblings("span").text('Sorry... Username already taken');
             setTimeout(function() {
                $('#username').siblings("span").text('');
              }, 3000);
         }else if (response == 'not_taken') {
             username_state = true;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_success");
             $('#username').siblings("i").removeClass("fas fa-sad-tear");
             $('#username').siblings("i").addClass("fas fa-grin-beam");
             $('#username').siblings("span").text('Username available');
             setTimeout(function() {
                $('#username').siblings("span").text('');
              }, 3000);
         }
       }
     });
    });	

     $('#email').on('blur', function(){
         email = $('#email').val();
         x = document.getElementById("email");
        if (email == '') {
            
            email = x.defaultValue;
            return;
        }
        if(email == x.defaultValue){
            email_state = true;
            $('#email').parent().removeClass();
               $('#email').parent().addClass("form_success");
               $('#email').siblings("i").removeClass("fas fa-sad-tear");
               $('#email').siblings("i").addClass("fas fa-grin-beam");
               $('#email').siblings("span").text('Email.. available');
               setTimeout(function() {
                $('#email').siblings("span").text('');
              }, 3000);
            return;
        }
        $.ajax({
         url: 'update_detail.php',
         type: 'post',
         data: {
             'email_check' : 1,
             'email' : email,
         },
         success: function(response){
            if(response == 'invalid'){
             email_state = false;
             $('#email').parent().removeClass();
             $('#email').parent().addClass("form_error");
             $('#email').siblings("i").removeClass("fas fa-grin-beam");
             $('#email').siblings("i").addClass("fas fa-sad-tear");
             $('#email').siblings("span").text('Sorry... Invalid Email taken');
             setTimeout(function() {
                $('#email').siblings("span").text('');
              }, 3000);
            }
            else if (response == 'taken' ) {
             email_state = false;
             $('#email').parent().removeClass();
             $('#email').parent().addClass("form_error");
             $('#email').siblings("i").removeClass("fas fa-grin-beam");
             $('#email').siblings("i").addClass("fas fa-sad-tear");
             $('#email').siblings("span").text('Sorry... Email already taken');
             setTimeout(function() {
                $('#email').siblings("span").text('');
              }, 3000);
             }else if (response == 'not_taken') {
               email_state = true;
               $('#email').parent().removeClass();
               $('#email').parent().addClass("form_success");
               $('#email').siblings("i").removeClass("fas fa-sad-tear");
               $('#email').siblings("i").addClass("fas fa-grin-beam");
               $('#email').siblings("span").text('Email.. available');
               setTimeout(function() {
                $('#email').siblings("span").text('');
              }, 3000);
             }
         }
        });
    });


    $('#password').on('blur', function(){
         pwd = $('#password').val();
         x = document.getElementById("password");
        if (pwd == '') {
           pwd = x.defaultValue;
            return;
        }
        if(pwd == x.defaultValue){
            pwd_state = true;
            $('#password').parent().removeClass();
            $('#password').parent().addClass("form_success");
            $('#password').siblings("i").removeClass("fas fa-sad-tear");
            $('#password').siblings("i").addClass("fas fa-grin-beam");
            $('#password').siblings("span").text('Password is Valid');
            setTimeout(function() {
                $('#password').siblings("span").text('');
              }, 3000);
            return;
        }
        $.ajax({
          url: 'update_detail.php',
          type: 'post',
          data: {
              'pwd_check' : 1,
              'pwd' : pwd,
          },
          success: function(response){
            if (response == 'invalid' ) {
                pwd_state = false;
                $('#password').parent().removeClass();
                $('#password').parent().addClass("form_error");
                $('#password').siblings("i").removeClass("fas fa-grin-beam");
                $('#password').siblings("i").addClass("fas fa-sad-tear");
                $('#password').siblings("span").text('Sorry... Password must contain Capital & Small Letters, Number, Special Char and size 6 or more');
                setTimeout(function() {
                    $('#password').siblings("span").text('');
                  }, 6000);
                
            }else if (response == 'valid') {
                pwd_state = true;
                $('#password').parent().removeClass();
                $('#password').parent().addClass("form_success");
                $('#password').siblings("i").removeClass("fas fa-sad-tear");
                $('#password').siblings("i").addClass("fas fa-grin-beam");
                $('#password').siblings("span").text('Password is Valid');
                setTimeout(function() {
                    $('#password').siblings("span").text('');
                  }, 3000);
            }
          }
        });
       });


       $('#fullname').on('blur',function(){
           fullname = $('#fullname').val();
           x = document.getElementById("fullname");
        if(fullname == ''){
            
            fullname = x.defaultValue;
            return;
        }
        if(fullname == x.defaultValue){
            fullname_state = true;
            $('#fullname').parent().removeClass();
            $('#fullname').parent().addClass("form_success");
            $('#fullname').siblings("i").removeClass("fas fa-sad-tear");
            $('#fullname').siblings("i").addClass("fas fa-grin-beam");
            $('#fullname').siblings("span").text('Amazing Name...');
            setTimeout(function() {
                $('#fullname').siblings("span").text('');
              }, 3000);
            return;
        }
        $.ajax({
            url : 'update_detail.php',
            type: 'post',
            data: {
                'fullname_check' : 1,
                 'fullname' : fullname, 
            },
            success:function(response) {
                if (response == 'invalid' ) {
                    fullname_state = false;
                    $('#fullname').parent().removeClass();
                    $('#fullname').parent().addClass("form_error");
                    $('#fullname').siblings("i").removeClass("fas fa-grin-beam");
                    $('#fullname').siblings("i").addClass("fas fa-sad-tear");
                    $('#fullname').siblings("span").text('Sorry... Name Format is Invalid');

                    setTimeout(function() {
                        $('#fullname').siblings("span").text('');
                      }, 3000);
                    
                }else if (response == 'valid') {
                    fullname_state = true;
                    $('#fullname').parent().removeClass();
                    $('#fullname').parent().addClass("form_success");
                    $('#fullname').siblings("i").removeClass("fas fa-sad-tear");
                    $('#fullname').siblings("i").addClass("fas fa-grin-beam");
                    $('#fullname').siblings("span").text('Amazing Name...');
                    setTimeout(function() {
                        $('#fullname').siblings("span").text('');
                      }, 3000);
                }
            }

        })
       });



       $('#country').on('blur',function(){
         country = $('#country').val();
         x = document.getElementById("country");
      if(country == ''){
        
        country = x.defaultValue;
          return;
      }
      if(country == x.defaultValue){
          country_state = true;
        $('#country').parent().removeClass();
        $('#country').parent().addClass("form_success");
        $('#country').siblings("i").removeClass("fas fa-sad-tear");
        $('#country').siblings("i").addClass("fas fa-grin-beam");
        $('#country').siblings("span").text('Country is Valid');
        setTimeout(function() {
          $('#country').siblings("span").text('');
        }, 3000);
        return;
    }
      $.ajax({
          url : 'update_detail.php',
          type: 'post',
          data: {
              'country_check' : 1,
               'country' : country, 
          },
          success:function(response) {
              if (response == 'invalid' ) {
                  country_state = false;
                  $('#country').parent().removeClass();
                  $('#country').parent().addClass("form_error");
                  $('#country').siblings("i").removeClass("fas fa-grin-beam");
                  $('#country').siblings("i").addClass("fas fa-sad-tear");
                  $('#country').siblings("span").text('Sorry... Country Format is Invalid');
                  setTimeout(function() {
                    $('#country').siblings("span").text('');
                  }, 3000);
                  
              }else if (response == 'valid') {
                  country_state = true;
                  $('#country').parent().removeClass();
                  $('#country').parent().addClass("form_success");
                  $('#country').siblings("i").removeClass("fas fa-sad-tear");
                  $('#country').siblings("i").addClass("fas fa-grin-beam");
                  $('#country').siblings("span").text('Country is Valid');
                  setTimeout(function() {
                    $('#country').siblings("span").text('');
                  }, 3000);
              }
          }

      })
     });

   
    $('#reg_btn').on('click', function(){
       // var username = $('#username').val();
       // var email = $('#email').val();
       // var password = $('#password').val();
       // var fullname = $('#fullname').val();
       // var gender =  $("input[name='gender']:checked").val();
       // var country = $('#country').val();
        
       
      // x = document.getElementById("user_id");
       // var user_id = x.defaultValue; 
        if (username_state == false || email_state == false || pwd_state == false || fullname_state == false|| country_state == false) {
         $('#error_msg').text('Fix the errors in the form first');
         setTimeout(function() {
            $('#error_msg').siblings("span").text('');
          }, 3000);
       }else{
         // proceed with form submission
         $.ajax({
             url: 'update_detail.php',
             type: 'post',
             data: {
                 'save' : 1,
                 
                 'email' : email,
                 'username' : username,
                 'password' : pwd,
                 'fullname' : fullname,
                 'country'  : country
             },
             success: function(response){

              if(response == 'updated'){
                 alert('Profile Updated Successfully...');
                 
                 $('#username').val('');
               //  $('#username').parent().removeClass('form_success');
               //  $('#username').siblings("span").text('');
                 $('#email').val('');
                 $('#password').val('');
                 $('#fullname').val('');
                 $('#gender').val('');
                 $('#country').val('');
                 
                 window.location.replace("http://localhost/book_store_login/project/myprofile.php");
              }
              else{
                alert('Something went wrong...');
              }
             }
         });
        }
    });


});




    
   //<i class="fas fa-grin-beam"></i>
   //<i class="fas fa-sad-tear"></i>
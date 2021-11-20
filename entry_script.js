$('document').ready(function(){

    
    var username_state = false;
    var email_state = false;
    var pwd_state = false;
    var fullname_state = false;
    var country_state = false;
    var log_username_state = false;
    var log_password_state = false;
    var log_username = '';

    $('#for_pass').on('click',function(){
        
        window.location.replace("http://localhost/book_store_login/project/forgot_password.php");
    });

    $('#username').on('blur', function(){
     var username = $('#username').val();
     if (username == '') {
         username_state = false;
         return;
     }
     $.ajax({
       url: 'register.php',
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
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
         url: 'register.php',
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
        var pwd = $('#password').val();
        if (pwd == '') {
            pwd_state = false;
            return;
        }
        $.ajax({
          url: 'register.php',
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
          var fullname = $('#fullname').val();
        if(fullname == ''){
            fullname_state = false;
            return;
        }
        $.ajax({
            url : 'register.php',
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
        var country = $('#country').val();
      if(country == ''){
          country_state = false;
          return;
      }
      $.ajax({
          url : 'register.php',
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
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var fullname = $('#fullname').val();
        var gender =  $("input[name='gender']:checked").val();
        var country = $('#country').val();
        if (username_state == false || email_state == false || pwd_state == false || fullname_state == false|| country_state == false) {
         $('#error_msg').text('Fix the errors in the form first');
         setTimeout(function() {
            $('#error_msg').siblings("span").text('');
          }, 3000);
       }else{
         // proceed with form submission
         $.ajax({
             url: 'register.php',
             type: 'post',
             data: {
                 'save' : 1,
                 'email' : email,
                 'username' : username,
                 'password' : password,
                 'fullname' : fullname,
                 'gender'   : gender,
                 'country'  : country
             },
             success: function(response){
                 alert('Registered Successfully...');
                 $('#username').val('');
               //  $('#username').parent().removeClass('form_success');
               //  $('#username').siblings("span").text('');
                 $('#email').val('');
                 $('#password').val('');
                 $('#fullname').val('');
                 $('#gender').val('');
                 $('#country').val('');


                 
                    $(".signIn").addClass("active-dx");
                    $(".signUp").addClass("inactive-sx");
                    $(".signUp").removeClass("active-sx");
                    $(".signIn").removeClass("inactive-dx");

             }
         });
        }
    });




    // login part

    $('#log_username').on('blur',function(){
         log_username = $('#log_username').val();
      if(log_username == ''){
          log_username_state = false;
          return;
      }
      $.ajax({
          url : 'register.php',
          type: 'post',
          data: {
              'log_username_check' : 1,
               'log_username' : log_username, 
          },
          success:function(response) {
              if (response == 'not_taken' ) {
                  log_username_state = false;
                  $('#log_username').parent().removeClass();
                  $('#log_username').parent().addClass("form_error");
                  $('#log_username').siblings("i").removeClass("fas fa-grin-beam");
                  $('#log_username').siblings("i").addClass("fas fa-sad-tear");
                  $('#log_username').siblings("span").text('Sorry... Invalid Username');
                  setTimeout(function() {
                    $('#log_username').siblings("span").text('');
                  }, 3000);
              }else if (response == 'taken') {
                  log_username_state = true;
                  $('#log_username').parent().removeClass();
                  $('#log_username').parent().addClass("form_success");
                  $('#log_username').siblings("i").removeClass("fas fa-sad-tear");
                  $('#log_username').siblings("i").addClass("fas fa-grin-beam");
                  $('#log_username').siblings("span").text('Looks Perfect !!');
                  setTimeout(function() {
                    $('#log_username').siblings("span").text('');
                  }, 3000);
              }
          }

      })
     });

     
     $('#log_password').on('blur',function(){
        var log_password = $('#log_password').val();
      if(log_password == '' || log_username == ''){
          log_password_state = false;
          return;
      }
      $.ajax({
          url : 'register.php',
          type: 'post',
          data: {
              'log_password_check' : 1,
               'log_password' : log_password, 
               'log_username' : log_username,
          },
          success:function(response) {
              
              if (response == 'invalid' ) {
                  log_password_state = false;
                  $('#log_password').parent().removeClass();
                  $('#log_password').parent().addClass("form_error");
                  $('#log_password').siblings("i").removeClass("fas fa-grin-beam");
                  $('#log_password').siblings("i").addClass("fas fa-sad-tear");
                  $('#log_password').siblings("span").text('Sorry... Invalid Password');
                  setTimeout(function() {
                    $('#log_password').siblings("span").text('');
                  }, 3000);
                  
              }else if (response == 'valid') {
                  log_password_state = true;
                  $('#log_password').parent().removeClass();
                  $('#log_password').parent().addClass("form_success");
                  $('#log_password').siblings("i").removeClass("fas fa-sad-tear");
                  $('#log_password').siblings("i").addClass("fas fa-grin-beam");
                  $('#log_password').siblings("span").text('Perfect Match !!');
                  setTimeout(function() {
                    $('#log_password').siblings("span").text('');
                  }, 3000);
              }
          }

      })
     });

  
     $('#log_btn').on('click',function(){
        
        if (log_username_state == false || log_password_state == false){
            $('#error_msg1').text('Fix the errors in the form first');
        }
        else{
            window.location.replace("http://localhost/book_store_login/project/home.php");
        }
     });

   });

   //<i class="fas fa-grin-beam"></i>
   //<i class="fas fa-sad-tear"></i>
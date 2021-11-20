$('document').ready(function(){

    var new_pwd = '';
    var new_pwd_state = false;

    $('#new_password').on('blur', function(){
         new_pwd = $('#new_password').val();
        if (new_pwd == '') {
            new_pwd_state = false;
            return;
        }
        $.ajax({
          url: 'update_password.php',
          type: 'post',
          data: {
              'new_pwd_check' : 1,
              'new_pwd' : new_pwd,
          },
          success: function(response){
            if (response == 'invalid' ) {
                new_pwd_state = false;
                $('#new_password').parent().removeClass();
                $('#new_password').parent().addClass("form_error");
                $('#new_password').siblings("span").text('Sorry... Password must contain Capital & Small Letters, Number, Special Char and size 6 or more');
                
            }else if (response == 'valid') {
                new_pwd_state = true;
                $('#new_password').parent().removeClass();
                $('#new_password').parent().addClass("form_success");
                $('#new_password').siblings("span").text('Password is Valid');
                
            }
          }
        });
       });

       $('#verify_password').on('blur',function(){

        verify_pwd = $('#verify_password').val();
        if (verify_pwd != new_pwd ) {
            verify_pwd_state = false;
            $('#verify_password').parent().removeClass();
            $('#verify_password').parent().addClass("form_error");
            $('#verify_password').siblings("span").text('Sorry... Password must contain Capital & Small Letters, Number, Special Char and size 6 or more');
            
        }else if (verify_pwd == new_pwd) {
            verify_pwd_state = true;
            $('#verify_password').parent().removeClass();
            $('#verify_password').parent().addClass("form_success");
            $('#verify_password').siblings("span").text('Perfect Match !!');
            
        }
         
       });

       $('#update').on('click',function(){

        if (new_pwd_state == false || verify_pwd_state == false ) {
            $('#error_msg').text('Fix the errors in the form first');
          }
          else{
            $.ajax({
                url: 'update_password.php',
                type: 'POST',
                data: {
                    'update' : 1,
                    'pwd' : new_pwd
                },
                success: function(response){
    
                    
                    if(response == 'updated'){
                        $('#error_msg').text('');
                        $('#success_msg').text('Update Successfull...');

                        setTimeout(function() {
                            window.location.replace("http://localhost/book_store_login/project/register.php");
                          }, 2000);
                    }
                    else{
                        $('#error_msg').text('Oops... Something went wrong'); 
                        $('#success_msg').text('');
                    }
            
                }
            });
          }

       });

});
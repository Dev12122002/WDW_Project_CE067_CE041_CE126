$('document').ready(function(){

    var username_state = false;
    var username = '';

    $('#username').on('blur',function(){
        username = $('#username').val();
     if(username == ''){
         username_state = false;
         return;
     }
     $.ajax({
         url : 'forgot_password.php',
         type: 'post',
         data: {
             'username_check' : 1,
              'username' : username, 
         },
         success:function(response) {
             
             if (response == 'not_taken' ) {
                  username_state = false;
                 $('#username').parent().removeClass();
                 $('#username').parent().addClass("form_error");
                 $('#username').siblings("span").text('Sorry... Invalid Username');
                 
             }else if (response == 'taken') {
                 username_state = true;
                 $('#username').parent().removeClass();
                 $('#username').parent().addClass("form_success");
                 $('#username').siblings("span").text('We found your Email Address...');
                 
             }
         }

     })
    });


    $('#change').on('click',function(){
       if(username_state == false){
        $('#error_msg').text('Fix the errors in the form first');
        $('#success_msg').text('');
       }
       else{
        username = $('#username').val();

        $.ajax({
            url: 'forgot_password.php',
            type: 'POST',
            data: {
                'change' : 1,
                'username' : username
            },
            success: function(response){

                
                if(response == 'sent'){
                    $('#error_msg').text('');
                    $('#success_msg').text('Follow the link provided in email to reset password..');
                }
                else{
                    $('#error_msg').text('Oops... Something went wrong'); 
                    $('#success_msg').text('');
                }
        
            }
        });
       }
    });

    $('#back').on('click',function(){

        window.location.replace("http://localhost/book_store_login/project/register.php");

    });

});
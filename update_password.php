<?php
session_start();
require_once "config.php";
if(isset($_GET['username'])){
  $_SESSION['new_user'] = $_GET['username'];
}

if (isset($_POST['new_pwd_check'])) {
    $password = $_POST['new_pwd'];

    $patternpwd1 = "/[\@\!\#\$\%\^\&\*\(\)\<\>\?\/\}\{\~\:\|]/";
      $pwd_error1 = preg_match($patternpwd1, $password);
    $patternpwd2 = "/[a-z]/";
      $pwd_error2 = preg_match($patternpwd2, $password);
    $patternpwd3 = "/[A-Z]/";
      $pwd_error3 = preg_match($patternpwd3, $password) ; 
    $patternpwd4 = "/[0-9]/";
      $pwd_error4 = preg_match($patternpwd4, $password) ; 
    if( !($pwd_error1 && $pwd_error2 && $pwd_error3 && $pwd_error4) || strlen($password)<6){
      echo 'invalid';
    } 
    else{
        echo 'valid';
    }

    exit();
}

if(isset($_POST['update'])){

  $username = $_SESSION['new_user'];
  $Password = $_POST['pwd'];
  $query = "UPDATE user_detail SET password='$Password' WHERE username = '$username'";
	if($result = mysqli_query($link,$query)){
    echo 'updated';
  }
  else{
    echo 'not';
  }

  exit();

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="update_password.css">
    <title>create_password</title>
</head>

<body>

    <div class="container">
        <form class="signUp">
            <h3>Update Password !!</h3>
            <div id="error_msg"></div>
            <div id="success_msg"></div>
            <div>
                <input type="password" id="new_password" placeholder="Create New Password" required>
                <span></span>
            </div>
             
            <div>
                <input type="password" id="verify_password" placeholder="Verify New Password" required>
                <span></span>
            </div>
        
            <button class="form-btn sx back" type="button" disabled>BACK</button>
            <button class="form-btn dx" id="update" type="button">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
   <script src="update_password.js"></script>

</body>

</html>
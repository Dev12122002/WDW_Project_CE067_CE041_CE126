<?php
include_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


if (isset($_POST['username_check'])) {
	$username = $_POST['username'];
	$sql = "SELECT * FROM user_detail WHERE username='$username'";
	$results = mysqli_query($link, $sql);
	
     if (mysqli_num_rows($results) > 0) {
	  echo "taken";	
	}else{
	  echo 'not_taken';
	}
   
	exit();
}
	
  if(isset($_POST['change'])) {
  
    $username = $_POST['username'];
    $sql = "SELECT * FROM user_detail WHERE username='$username'";
  	$results = mysqli_query($link, $sql);

      if($row = mysqli_fetch_assoc($results)){

        $visitor_email = $row['email'];
    $user_message = "Hi, $username. Click http://localhost/book_store_login/project/update_password.php?username=$username to reset the password. If it is not you please ignore";
        $mail = new PHPMailer();
        $mail->IsSMTP();  // telling the class to use SMTP
       // $mail->SMTPDebug = 2;
        $mail->Mailer = "smtp";
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = "girianish2711@gmail.com"; // SMTP username
            // $mail->Password = "wxsn gwce rxuy vvmj"; // SMTP password
             $mail->Password = "tzwk yobt znub kcsy"; // SMTP password
      //  $Mail->Priority = 1;
        $mail->AddAddress($visitor_email, $username);
        $mail->SetFrom($visitor_email, $username);
       // $mail->AddReplyTo($visitor_email,$name);
        $mail->Subject  = "Reset Password for Speaking Books";
        $mail->Body     = $user_message;
        $mail->WordWrap = 50;
        if(!$mail->Send()) {
        
        echo 'not_sent';

        } else {
        echo 'sent';
        }
       
  }
  else{
	echo 'not_sent';
   } 

   exit();
 }
//echo phpinfo();
mysqli_close($link);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="forgot_password.css?v=<?php echo time(); ?>">
    <title>forgot_password</title>
</head>

<body>

    <div class="container">
        <form class="signUp">
            <h3>Forgot Password !!</h3>
            <div id="error_msg"></div>
            <div id="success_msg"></div>
             <div>
                 <span></span>
                <input type="text" id="username" placeholder="Enter Your Unique Username" required>
            </div>   
        
            <button class="form-btn sx back" id="back" type="button">BACK</button>
            <button class="form-btn dx" id="change" type="button">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
   <script src="forgot_password.js"></script>
</body>

</html>
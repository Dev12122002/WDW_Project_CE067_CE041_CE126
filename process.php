<?php 
  //$db = mysqli_connect('localhost', 'root', '', 'taken');
  require_once "config.php";
  $patternpwd1 = "/[\@\!\#\$\%\^\&\*\(\)\<\>\?\/\}\{\~\:\|]/";

  if (isset($_POST['username_check'])) {
  	$username = $_POST['username'];
  	$sql = "SELECT * FROM user_detail WHERE username='$username'";
  	$results = mysqli_query($link, $sql);
	$username_error = preg_match($patternpwd1, $username);

	if($username_error){
		echo "invalid";
	}
  	else if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo "not_taken";
  	}
  	exit();
  }
  if (isset($_POST['email_check'])) {
  	$email = $_POST['email'];
  	$sql = "SELECT * FROM user_detail WHERE email='$email'";
  	$results = mysqli_query($link, $sql);
	  if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		echo 'invalid';
	  } 
  	else if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
	 
  	exit();
  }
  if (isset($_POST['pwd_check'])) {
	  $password = $_POST['pwd'];

	  
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

  if (isset($_POST['fullname_check'])){

	$fullname_error = preg_match($patternpwd1, $_POST['fullname']);
	if($fullname_error){
		echo 'invalid';
	}
	else{
		echo 'valid';
	}

	exit();
  }

  if (isset($_POST['country_check'])){

	$country_error = preg_match($patternpwd1, $_POST['country']);
	if($country_error){
		echo 'invalid';
	}
	else{
		echo 'valid';
	}

	exit();
  }

  if (isset($_POST['save'])) {
	$fullname = $_POST['fullname'];
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
	$country = $_POST['country'];
	$gender = $_POST['gender'];  
  	$sql = "SELECT * FROM user_detail WHERE username='$username'";
  	$results = mysqli_query($link, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "exists";	
  	  exit();
  	}else{
  	  $query = "INSERT INTO user_detail (username, fullname, email, password, country, gender) 
  	       	VALUES ('$username', '$fullname', '$email', '$password','$country','$gender')";
  	  $results = mysqli_query($link, $query);
  	  echo 'Saved!';
  	  exit();
  	}
  }


  //log In part


 
  if (isset($_POST['log_username_check'])) {
	$log_username = $_POST['log_username'];
	$sql = "SELECT * FROM user_detail WHERE username='$log_username'";
	$results = mysqli_query($link, $sql);
	
     if (mysqli_num_rows($results) > 0) {
	  echo "taken";	
	}else{
	  echo 'not_taken';
	}
   
	exit();
}

if (isset($_POST['log_password_check'])) {

	$sql = "SELECT * FROM user_detail WHERE username='".$_POST['log_username']."'";
	$results = mysqli_query($link, $sql);
	
    if($row = mysqli_fetch_assoc($results)){
	  if( $row['password'] != $_POST['log_password'] ){
		 echo 'invalid';
	   }
	   else{
		 echo 'valid';
		 session_start();
		 $_SESSION['username'] = $_POST['log_username'];
	   }
	}
	else{
		echo 'invalid';
	}
    
	

    // echo 'invalid';
	exit();
}


?>
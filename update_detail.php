<?php include('update_detail_process.php');
                     require_once "config.php";
                     session_start();
                     $sql = "SELECT * FROM user_detail WHERE username = ?";
                     $stmt = mysqli_prepare($link, $sql);
                     mysqli_stmt_bind_param($stmt, "s", $param_username);
                     $param_username = $_SESSION["username"];

    // Try to execute this statement
                        mysqli_stmt_execute($stmt);
                         $result = mysqli_stmt_get_result($stmt);
                         $row = mysqli_fetch_array($result);
                         $_SESSION["user_id"] = $row['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="update_detail.css?v=<?php echo time(); ?>" >
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

  <div class="container">
    <form class="signUp" id="register_form">
      <h3>Update Your Account</h3>
      <p>Please Provide Necessary Informations</br> you want to update.</p>
      <div id="error_msg"></div>
      <div>
        <i></i>
        <input type="text" name="fullname" placeholder="Update your name" id="fullname" value=<?php echo $row['fullname']; ?> required/>
        <span></span>
      </div>
     
      <div>
        <i></i>
        <input type="text" name="username" placeholder="Update username" id="username" value=<?php echo $row['username']; ?> reqired />
        <span></span>
      </div>
      <div>
      <i></i>
        <input type="text"   name="password" placeholder="Update Password" id="password" value=<?php echo $row['password']; ?>  required />
        <span></span>
      </div>
      <div>
      <i></i>
        <input type="email" name="email" placeholder="Update your email address" id="email" value=<?php echo $row['email']; ?> required />
        <span></span>
      </div>
      
      <div>
      <i></i>
        <input type="text" name="country" placeholder="Update your country name" id="country" value=<?php echo $row['country']; ?> reqired />
        <span></span>
      </div>
      
      
      <button class="form-btn sx log-in" id="back" type="button">Back</button>
      <button class="form-btn dx" id="reg_btn" name="register" type="button">Submit</button>
    </form>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
  <script src="update_detail.js"></script>
</body>

</html>
<?php include('process.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="flip.css?v=<?php echo time(); ?>" >
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

  <div class="container">
    <form class="signUp" id="register_form">
      <h3>Create Your Account</h3>
      <p>Please Provide Necessary Informations</br> To Join Us.</p>
      <div id="error_msg"></div>
      <div>
        <i></i>
        <input type="text" name="fullname" placeholder="Enter your name" id="fullname" required/>
        <span></span>
      </div>
      <div>
        <i></i>
        <input type="text" name="username" placeholder="Create a unique username" id="username" reqired />
        <span></span>
      </div>
      <div>
      <i></i>
        <input type="password"   name="password" placeholder="Create Password" id="password"  required />
        <span></span>
      </div>
      <div>
      <i></i>
        <input type="email" name="email" placeholder="Enter your email address" id="email" required />
        <span></span>
      </div>
      
      <div>
      <i></i>
        <input type="text" name="country" placeholder="Enter your country name" id="country" reqired />
        <span></span>
      </div>
      <div class="radio">
        <p style="display: inline;">Gender :</p>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
      </div>
      
      <button class="form-btn sx log-in" type="button">Log In</button>
      <button class="form-btn dx" id="reg_btn" name="register" type="button">Sign Up</button>
    </form>

    <form class="signIn" id="log_in_form">
      <h3>Welcome Back !<br> Login to your account</h3>
      <!-- <button class="fb" type="button">Log In With Facebook</button>
      <p>- or -</p> -->
      <div id="error_msg1"></div>
      <div>
      <i></i>
      <input type="text" placeholder="Enter your username" id="log_username" reqired />
      <span></span>
      </div>

      <div>
      <i></i>
      <input type="password" placeholder="Enter Password" id="log_password" reqired />
      <span></span>
      </div>
      <!-- <button  id="for_pass" type="button">Forgot Password</button> -->
    
      <div id="jk">
</div>
      <a href="forgot_password.php">Forgot Password !!</a>

      <button class="form-btn sx back" type="button">Back</button>
      <button class="form-btn dx" id="log_btn" type="button">Log In</button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
  <script src="flip.js"></script>
  <script src="entry_script.js"></script>
</body>

</html>
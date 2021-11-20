<?php
session_start();
$_SESSION['email'] = 0;
$_SESSION['not_send'] = 0;
$_SESSION['send'] = 0;

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';


if(isset($_POST['submit'])){


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $_SESSION['email'] = 1;
    $flag = 1;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $_SESSION['email'] = 0;
      $flag = 0;
    }

    if($flag==1){
        header("location: contact.php");
        exit();
    }

    
    $user_message = " Comment of a User, $name , $email ,  message: $message ";
    $visitor_email = "girianishpramodbhai@gmail.com";
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
        $mail->AddAddress($visitor_email);
        $mail->SetFrom($visitor_email);
       // $mail->AddReplyTo($visitor_email,$name);
        $mail->Subject  = "Comments for PDF Narrator";
        $mail->Body     = $user_message;
        $mail->WordWrap = 50;
        if(!$mail->Send()) {
        $_SESSION['not_send'] = 1;
       // echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
        $_SESSION['send'] = 1;
        }
}


?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css?v=<?php echo time(); ?>" >
    <!-- <link rel="stylesheet" href="contact.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Hello, world!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">

    <div class="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark" id="navbar_top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PDF-Narrator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="myprofile.php">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <div class="info">
            <h1>
                <span class="txt-rotate" data-period="2000" data-rotate='[ "Contact Us"]'></span>
            </h1>
            <h4><a href="#category"><span class="txt-rotate" data-period="2000"
                        data-rotate='[ "Contact information of developers"]'></span></a></h4>
        </div>

    </div>

    <nav id="navbar-example2" class="navbar  navbar-light bg-light p-4">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading1">Contact info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2">Contact form</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading3">footer</a>
            </li>
        </ul>
    </nav>

    <canvas></canvas>

    <div class="info">
        <h1 id="hh">
            <span class="txt-rotate" data-period="2000" data-rotate='[ "Contact Information"]'></span>
        </h1>
    </div>
    
    <div id="scrollspyHeading1" style="margin-bottom: 20px;"></div>
    <div class="c1">
        <div class="container">
            <div class="box">
                <div class="imgbx">
                    <img src="call.png">
                </div>
                <div class="content2">
                    <h3>Mobile no.</h3>
                    <h4><strong>Anish Giri : </strong>9313860094</h4>
                    <h4><strong>Dev Oza : </strong>7201066052</h4>
                    <h4><strong>Pratham Tailor : </strong>9265045066</h4>
                </div>
            </div>
            <div class="box">
                <div class="imgbx">
                    <img src="email.png">
                </div>
                <div class="content2">
                    <h3>E-mail</h3>
                    <h4><strong>Anish Giri : </strong>girianishpramodbhai@gmail.com</h4>
                    <h4><strong>Dev Oza : </strong> devoza121220@gmail.com</h4>
                    <h4><strong>Pratham Tailor : </strong>prathamtailor0809@gmail.com</h4>
                </div>            
            </div>
            <div class="box">
                <div class="imgbx">
                    <img src="location.png">
                </div>
                <div class="content2">
                    <h3>Address of Head Quarters</h3>
                    <h4>Ls Boys Hostel,UTTARSANDA ROAD,opposite D-Mart,Nadiad,Gujarat.</h4>
                </div>           
            </div>
        </div>
    </div>

    <div class="info" id="scrollspyHeading2">
        <h1 id="hh">
            <span class="txt-rotate" data-period="2000" data-rotate='[ "If You Have any doubt or any suggestion then contact us by below form"]'></span>
        </h1>
    </div>
    <!-- <h1 id="hh">If You Have any doubt or any suggestion then contact us by below form</h1> -->


    <!-- <div class="border" id="alert"></div> -->
    <?php
    if($_SESSION['send'] == 1){
        echo '<script>window.alert("Thanks for your valuable message")</script>'
    ?>
     <!-- <div class="success"> 
    
      <strong> Thanks for your valuable message !!</strong> 
      <span class="closebtn">&times;</span>
    </div> -->
    <?php
    unset($_SESSION['send']);
  }
  if($_SESSION['not_send'] == 1){
    echo '<script>window.alert("Something went wrong, Please try again...")</script>'
    ?>
    <!-- <div class="alert">
    
      <strong> Something went wrong, Please try again... </strong> 
      <span class="closebtn">&times;</span>
    </div> -->

    <?php
    unset($_SESSION['not_send']);
  }

  if($_SESSION['email'] == 1){
    echo '<script>window.alert("Invalid email, Please try again...")</script>'
    ?>
    <div class="alert">
    
      <strong> Invalid email, Please try again... </strong> 
      <span class="closebtn">&times;</span>
    </div>
    <?php
    unset($_SESSION['email']);
  }
?>
  
  <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>


    <div class="contact-section">
        <form action="" method="POST" class="contact-form">
            <h1>Feel Free to contact us</h1>
            <input type="text" name="name" class="contact-form-text" placeholder="Your Name">
            <input type="email" name="email" id="email" class="contact-form-text" placeholder="Your e-mail address">
            <!-- <input type="text" name="message" id="message" class="contact-form-text" placeholder="Your Message..."> -->
            <textarea name="message" id="message" placeholder="Type Your Message...."></textarea>
            <input type="submit" value="Send" id="submit" name="submit">
        </form>
    </div>

    <div class="foot" id="scrollspyHeading3">

        <div class="image">
            <img src="800px_COLOURBOX29105580.jpg">
        </div>

        <ul class="footer-right">
            <li>
                <ul class="detail-box">
                    <li><a href="home.php"><h2>Home</h2></a></li>
                    <li>Introduction</li>
                    <li>Video Explanation</li>
                    <li>Text To Speech</li>
                    <li>Recenttly Uploaded</li>
                </ul>
            </li>
    
            <li>
                <ul class="detail-box">
                    <li><a href="about.php"><h2>About Us</h2></a></li>
                    <li>Introduction</li>
                    <li>About Designers</li>
                </ul>
            </li>
    
            <li>
                
    
                <ul class="detail-box">
                    <li><a href="contact.php"><h2>Contact Us</h2></a></li>
                    <li>Contact info</li>
                    <li>Contact Form</li>
                </ul>
            </li>
    
            <li>
                <ul class="detail-box">
                    <li><a href="myprofile.php"><h2>My Profile</h2></a></li>
                    <li>Your Profile</li>
                    <li>Your pdf</li>
                </ul>
            </li>
    
        </ul>

        <footer class="footer">

            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
            </ul>
            <p>&copy;2021 Audio-Book | All Rights Reserved</p>
        </footer>
    </div>

    <footer class="footer1">
        <div id="footer__progress_bar">0%</div>
    </footer>

    <script>
        window.onscroll = function () { ScrollIndicator() };

        function ScrollIndicator() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById('footer__progress_bar').style.width = scrolled + "%";
            document.getElementById('footer__progress_bar').innerHTML = Math.round(scrolled) + "%"
        }
    </script>

    <script src="contact.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
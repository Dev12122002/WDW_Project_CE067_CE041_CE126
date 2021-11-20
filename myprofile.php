<?php

session_start();
$name = "";
$username = "";
$password = "";
$gender = "";
$email = "";
$country = "";

if (isset($_SESSION["username"])) {
    require_once "config.php";

    //$sql = "SELECT name, username, password, gender, email, age, occupation, country, state FROM userinfo WHERE username = ?";
    $sql = "SELECT * FROM user_detail WHERE username = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $_SESSION["username"];

    // Try to execute this statement
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // Retrieve individual field value 
        $name = $row["fullname"];
        $username = $row["username"];
        $password = $row["password"];
        $gender = $row["gender"];
        $email = $row["email"];
        $country = $row["country"];
    } else {
        echo "Try after some time";
    }

   
} else {
    $_SESSION['username'] = "";
    echo '<script>window.alert("First login yourself")</script>';
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="myprofile.css?v=<?php echo time(); ?>" >
    <!-- <link rel="stylesheet" href="myprofile.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="170" class="scrollspy-example" tabindex="0">

    <div class="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark" id="navbar_top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PDF-Narrator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <div class="info">
            <h1>
                <span class="txt-rotate" data-period="2000" data-rotate='[ "MY PROFILE"]'></span>
            </h1>
            <h4><a href="#category"><span class="txt-rotate" data-period="2000" data-rotate='["Includes your Uploaded PDFs"]'></span></a></h4>
        </div>

    </div>

    <nav id="navbar-example2" class="navbar  navbar-light bg-light p-4">

        <ul class="nav navbar-pills">
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading1">Your Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2">Your PDF'S</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading3">Footer</a>
            </li>
        </ul>
    </nav>

    <canvas></canvas>

    <div class="container" id="scrollspyHeading1" style="margin-top: 12%;">
        <div class="row prof">
            <div class="col-md-6">

                <div class="row">
                    <div class="col phpimg">
                        <?php

                        if ($gender == "male") {
                            echo '<img src="user2.png" />';
                        } else if ($gender == "female") {
                            echo '<img src="user3.jpg" />';
                        } else {
                            echo '<img src="user3.png" />';
                        }

                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Your Profile</h5>
                                <h8 class="card-title">Click Here</h8>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 info1">
                                            <h2>Name </h2>
                                            <p><?php echo $name; ?></p>
                                        </div>

                                        <div class="col-md-6 info1">
                                            <h2>Username </h2>
                                            <p><?php echo $username; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col info1">
                                            <h2>Gender </h2>
                                            <p><?php echo $gender; ?></p>
                                        </div>

                                        <div class="col info1">
                                            <h2>Email </h2>
                                            <p><?php echo $email; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col info1">
                                            <h2>Country </h2>
                                            <p><?php echo $country; ?></p>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-secondry"><a href='update_detail.php'> Update Your Details </a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>




<?php
require_once "config.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM pdf_detail WHERE username = '$username'";
$result = mysqli_query($link, $sql);

if ($result) {
    if ((mysqli_num_rows($result) > 0)) {

?>

<div id="scrollspyHeading2"></div>
<div class="container-fluid text-center mt-5 p-3" style="margin-top: 10%!important;">
   <h1>Your PDF'S</h1>
</div>

        <div class="container" style="margin-top: 2%; padding-bottom: 6%;">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $i++;
                $name = $row['pdf_name'];
                $type = $row['access_type'];
                $date = $row['upload_date'];
                $id = $row['pdf_id'];

            ?>

                <div class="row pdf p-4">
                    <div class="col-1">
                    <h4> <?php echo $id.")"; ?> </h4>
                    </div>
                    <div class="col-2 text-right" style="text-align: right">
                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: x-large; color: red"></i>
                    </div>
                    <div class="col-5">
                        <h5> <?php echo $name; ?> </h5>
                    </div>
                    <div class="col-2" style="text-align:center;">
                        <h5> <?php echo $type; ?> </h5>
                    </div>
                    <!-- <div class="col-2" style="border: 2px solid black; text-align:right;">
                        <p> <?php echo $date; ?> </p>
                    </div> -->
                    <div class="col-2" style="text-align:center;">
                       <button class="load_pdfdata btn btn-danger pd"   href="<?php echo $row['pdf_location']; ?>" style="width: auto; padding: 5% 11%; border: none; background: #529b35"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                    </div>
                    <!-- <div class="col-1"></div> -->
                </div>

                <!-- <hr> -->


            <?php } ?>

        </div>

<?php

    } else {
        echo '

        <div class="container-fluid text-center mt-5 p-3" id="scrollspyHeading2" style="margin-top: 10%!important;">
   <h1>Your PDF</h1>
</div>
        
        <div class="container">
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 5%; padding-bottom: 5%;"><h4>You have not uploaded any PDF yet !!</h4></div>
        </div>
    </div>';
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 // Close statement
 mysqli_stmt_close($stmt);

 // Close connection
 mysqli_close($link);

?>

<div id="scrollspyHeading3"></div>
    <div class="foot">

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

    <footer>
        <div id="footer__progress_bar">0%</div>
    </footer>
    <!-- <div class="footer">
    <div id="footer__progress_bar">0%</div>
    </div> -->



    <script>
        window.onscroll = function() {
            ScrollIndicator()
        };

        function ScrollIndicator() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById('footer__progress_bar').style.width = scrolled + "%";
            document.getElementById('footer__progress_bar').innerHTML = Math.round(scrolled) + "%"
        }

        $(document).ready(function(){
            $('[data-spy="scroll"]').each(function () {
                var $spy = $(this).scrollspy('refresh')
                }); 
        });

    </script>

  <!--  <script type="text/javascript" src="vanilla-tilt.js"></script> -->

    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 50,
            speed: 400,
            glare: true,
        })
    </script>

    <script src="myprofile.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>


    
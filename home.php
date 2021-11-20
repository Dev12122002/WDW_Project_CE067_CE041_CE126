
<?php

require_once "config.php";
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>" >
    <!-- <link rel="stylesheet" href="home.css" > -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
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
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <div class="info">
            <h1>
                <span class="txt-rotate" data-period="2000" data-rotate='[ "PDF - NARRATOR"]'></span>
            </h1>
            <h4><a href="#category"><span class="txt-rotate" data-period="2000"
                        data-rotate='[ "CONVERT YOUR PDF INTO AUDIO PDF"]'></span></a></h4>
        </div>

    </div>

    <nav id="navbar-example2" class="navbar  navbar-light bg-light p-4">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading1">Introduction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2">Video Explaination</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading3">Custom Text To Speech</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading4">Upload PDF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading5">footer</a>
            </li>
        </ul>
    </nav>

    <canvas></canvas>

    <div id="scrollspyHeading1"></div>
    <section class="content">
        <h1>Introduction</h1>
        <p>A warm welcome to all our dear readers!!</p>
        <p>In "PDF Narrator", we help you to read as many books as feasible to you by providing an environment in which you can convert your PDF into "Audio PDF"
            . This is a exclusive website "PDF Narrator" where you just need to upload your PDF and by selecting proper lines/paragraph you can convert that into a audio 
            . You can also use and provide the valuable PDFs that you need and that community need by uploading it in "Public Mode" 
            . Moreover You can change the narrator volume, voice, rate as well as pitch in settings . We have provided a facility where you can provide a custom text and finds its Audio version 
            . Hope this website puts some more values to your great knowledge .
        </p>
    </section>

    <div id="scrollspyHeading2"></div>
    <div class="container-fluid video">
        <div class="row">
            <div class="vintro mb-3 col-md-12">
                <div class="card-body">
                    <h1 class="card-title">How to use our website ?</h1>
                    <p class="card-text">- Watch the video till end to gain complete knowledge of our website. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="vid col-md-6">
                <iframe height="350" width="600" src="https://www.youtube.com/embed/Uh9643c2P6k"></iframe>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <div id="scrollspyHeading3"></div>
    <div class="container-fluid speech">

        <div class="m-intro">
            <div class="e-text sp">
                <span class="subtitle txt-rotate" data-period="2000"
                    data-rotate='[ "Type to convert your text into speech"]'></span>
                <h1>text to Audio</h1>
                <p class="preamble">
                <div class="container sp-main text-center">
                    <div class="row sp-row">
                        <div class="col-md-12 sp-col">

                            <p class="lead text-light mt-4">Select Voice</p>

                            <!-- Select Menu for Voice -->
                            <select id="voices" class="form-select bg-secondary text-light"></select>

                            <!-- Range Slliders for Volume, Rate & Pitch -->
                            <div class=" mt-4 sp-settings text-light row">
                                <div class="col-sm-12 col-md-3">
                                    <p class="lead">Volume</p>
                                    <input type="range" min="0" max="1" value="1" step="0.1" id="volume" />
                                    <span id="volume-label" class="ms-2">1</span>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p class="lead">Rate</p>
                                    <input type="range" min="0.1" max="10" value="1" id="rate" step="0.1" />
                                    <span id="rate-label" class="ms-2">1</span>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p class="lead">Pitch</p>
                                    <input type="range" min="0" max="2" value="1" step="0.1" id="pitch" />
                                    <span id="pitch-label" class="ms-2">1</span>
                                </div>
                            </div>

                            <!-- Text Area  for the User to Type -->
                            <textarea class="form-control bg-dark text-light mt-5" cols="30" rows="10"
                                placeholder="Type here to convert into speech..."></textarea>

                            <!-- Control Buttons -->
                            <div class="mb-5 sp-event">
                                <button id="start" class="btn btn-success mt-5 me-3 sm-me-1">Start</button>
                                <button id="pause" class="btn btn-warning mt-5 me-3 sm-me-1">Pause</button>
                                <button id="resume" class="btn btn-info mt-5 me-3 sm-me-1">Resume</button>
                                <button id="cancel" class="btn btn-danger mt-5 me-3 sm-me-1">Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>
                </p>
            </div>
            <div id="particleCanvas-Orange" class="e-particles-orange"></div>
            <div id="particleCanvas-Blue" class="e-particles-blue"></div>
        </div>

    </div>
    
    <div id="scrollspyHeading4"></div>
    <div class="info" id="heading_of_upload">
            <h1>
                <span class="txt-rotate" data-period="2000" data-rotate='[ "Upload PDF"]'></span>
            </h1>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-2"></div>
        <div class="upload_pdf_form text-center col-8 p-4 mt-5 mb-5" >
        <form>
           <!-- <input  type="file" id="file-input" /> -->
            <label class="custom-file-upload">
                   <input type="file" id="file-input"/>
                     Click to select a PDF
            </label>
            <div class="radio">
               <p style="display: inline;">Choose Visibility :</p>
               <input type="radio" id="access1" name="access_type" value="public" required> Public
               <input type="radio" id="access2" name="access_type" value="private" required> Private
            </div>

            <div class="button_for_show">
                    <button type="button" class="btn-grad" id="upload-button">Upload PDF</button>
                    <button type="button" class="btn-grad" id="open_pdf" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          SHOW PDFs
                    </button>
             </div>

        </div>
         <div class="col-2"></div>
        </div>
    
    </div>

    <div id="scrollspyHeading5"></div>
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
            window.onscroll = function () { ScrollIndicator() };
    
            function ScrollIndicator() {
                var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var scrolled = (winScroll / height) * 100;
                document.getElementById('footer__progress_bar').style.width = scrolled + "%";
                document.getElementById('footer__progress_bar').innerHTML = Math.round(scrolled) + "%"
            }
        </script>








<!-- Hello -->
    

   


      
          <!--  <div>
                <canvas id="cnv"></canvas>
            </div>
            <button id="prev">Prev</button>
            <button id="next">Next</button>
            <span id="npages">not yet</span> -->
      

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Open PDF</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="button_for_show">
                <button type="button" class="btn-grad" id="private_pdf" data-bs-toggle="modal" data-bs-target="#private">
                    Private PDF
                  </button>
                  <button type="button" class="btn-grad" id="public_pdf" data-bs-toggle="modal" data-bs-target="#public">
                    Public PDF
                  </button>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="private" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Private PDF</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                     
                     $sql = "SELECT * FROM pdf_detail WHERE username = ? AND access_type = 'private'";
                     $stmt = mysqli_prepare($link, $sql);
                     mysqli_stmt_bind_param($stmt, "s", $param_username);
                     $param_username = $_SESSION["username"];

    // Try to execute this statement
                     if (mysqli_stmt_execute($stmt)) {
                         $result = mysqli_stmt_get_result($stmt);

                         if(mysqli_num_rows($result) > 0){

                            echo "<table border='2' align='center'>";
                            echo "<thead>";
				            echo "<tr>";
					        echo "<th>Name</th>";
					        echo "<th>Upload Date - Time</th>";
					        echo "<th>Uploaded By</th>";
					        echo "</tr>";
			                echo "</thead>";
                           //data-bs-toggle="modal" data-bs-target="#load_pdf"
			                echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>" ;?> <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: x-large; color: red"></i> <?php echo $row['pdf_name']; ?> <button type="button"  class="load_pdfdata" href="<?php echo $row['pdf_location']; ?>">Open Pdf</button> <?php echo  "</td>";
                                echo "<td>" . $row['upload_date'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
		                    echo "</table>";
                         }
                         else{
                             echo "Please Upload A Pdf File...";
                         }
       
                    } else {
                         echo "Try after some time";
                    }

                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="open_pdf" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    BACK
                  </button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="public" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Open PDF</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                     
                     $sql = "SELECT * FROM pdf_detail WHERE  access_type = 'public'";
                     $stmt = mysqli_prepare($link, $sql);

    // Try to execute this statement
                     if (mysqli_stmt_execute($stmt)) {
                         $result = mysqli_stmt_get_result($stmt);

                         if(mysqli_num_rows($result) > 0){

                            echo "<table border='2' align='center'>";
                            echo "<thead>";
				            echo "<tr>";
					        echo "<th>Name</th>";
					        echo "<th>Upload Date - Time</th>";
					        echo "<th>Uploaded By</th>";
					        echo "</tr>";
			                echo "</thead>";

			                echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>" ;?> <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: x-large; color: red"></i> <?php echo $row['pdf_name']; ?> <button type="button"  class="load_pdfdata" href="<?php echo $row['pdf_location']; ?>">Open Pdf</button> <?php echo  "</td>";
                                echo "<td>" . $row['upload_date'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
		                    echo "</table>";
                         }
                         else{
                             echo "Please Upload A Pdf File...";
                         }
       
                    } else {
                         echo "Try after some time";
                    }

                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="open_pdf" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    BACK
                  </button>
            </div>
          </div>
        </div>
      </div>








      

    <footer>
    <div id="footer__progress_bar">0%</div>
    </footer> 
    <!-- <div class="footer">
    <div id="footer__progress_bar">0%</div>
    </div> -->
    


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
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.4.456/pdf.min.js"></script>
    <script src="home.js"></script>
    <script src="uploadpdf.js"></script>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
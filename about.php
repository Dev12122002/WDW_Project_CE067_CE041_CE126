<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="about.css?v=<?php echo time(); ?>" >
    <!-- <link rel="stylesheet" href="about.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
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
                <span class="txt-rotate" data-period="2000" data-rotate='[ "About Us"]'></span>
            </h1>
            <h4><a href="#category"><span class="txt-rotate" data-period="2000"
                        data-rotate='[ "About Developers"]'></span></a></h4>
        </div>

    </div>

    <nav id="navbar-example2" class="navbar  navbar-light bg-light p-4">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading1">Introduction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading2">About Developers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#scrollspyHeading3">footer</a>
            </li>
        </ul>
    </nav>

    <canvas></canvas>

    <div id="scrollspyHeading1" style="margin-bottom: 20px;"></div>
    <section class="content" style="font-size: larger;">
        <h1>Introduction</h1>
        <p>We are a group of 3 students who loves to develop creative websites to help community.</p><p> We are a group where we are always ready to do new things. </p>
    </section>

    <div id="scrollspyHeading2" style="margin-bottom: 20px;"></div>
    <section class="content">
        <h1>About Developers</h1>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="Pratham.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Pratham Tailor</h5>
                            <p class="card-text">Student of 2nd Year Computer Engineering in Dharmsinh Desai University. Have a good Hand in HTML, CSS, Javascript, PHP, C and C++ Programming.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="dev.jpeg">
                        <div class="card-body">
                            <h5 class="card-title">Dev Oza</h5>
                            <p class="card-text">Student of 2nd Year Computer Engineering in Dharmsinh Desai University. Have a good Hand in HTML, CSS, Javascript, PHP, C and C++ Programming.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="anish.PNG">
                        <div class="card-body">
                            <h5 class="card-title">Anish giri</h5>
                            <p class="card-text">Student of 2nd Year Computer Engineering in Dharmsinh Desai University. Have a good Hand in HTML, CSS, Javascript, PHP, C and C++ Programming.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript" src="vanilla-tilt.js"></script>

    <script>VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 50,
            speed: 400,
            glare: true,
        })
    </script>

<!-- <footer class="f">
    <div class="footer-left">
        <img src="152-1524229_audiobook-logo-png-transparent-png.png">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic porro voluptatum consequuntur laborum eius eum repellendus error fuga adipisci reiciendis.</p>
    </div>
    <ul class="footer-right">
        <li>
            <a href="#"><h2>Home</h2></a>

            <ul class="detail-box">
                <li>Introduction</li>
                <li>Video Explanation</li>
                <li>Text To Speech</li>
                <li>Recenttly Uploaded</li>
            </ul>
        </li>

        <li>
            <a href="#"><h2>About Us</h2></a>

            <ul class="detail-box">
                <li>Introduction</li>
                <li>About Designers</li>
                <li>footer</li>
            </ul>
        </li>

        <li>
            <a href="#"><h2>Contact Us</h2></a>

            <ul class="detail-box">
                <li>Introduction</li>
                <li>Contact info</li>
                <li>Contact Form</li>
            </ul>
        </li>

        <li>
            <a href="#"><h2>My Profile</h2></a>

            <ul class="detail-box">
                <li>Introduction</li>
                <li>Contact info</li>
                <li>Contact Form</li>
            </ul>
        </li>

    </ul>
</footer> -->

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

    <script src="about.js"></script>
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
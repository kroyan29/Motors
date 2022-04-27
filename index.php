<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/animsition.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/carusel.js"></script>
    <title>Motors</title>
    <style>
        .wrapper {
            height: 700px;

            width: 100%;
        }

        .slider {
            background-color: #ddd;
            height: inherit;
            overflow: hidden;
            position: relative;
            width: inherit;
            -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, .5);
            -moz-box-shadow: 0 0 20px rgba(0, 0, 0, .5);
            -o-box-shadow: 0 0 20px rgba(0, 0, 0, .5);
            box-shadow: 0 0 20px rgba(0, 0, 0, .5);
        }

        .wrapper>input {
            display: none;
        }

        .slides {
            height: inherit;
            position: absolute;
            width: inherit;
        }

        .slide1 {
            background-image: url(img/slaid1.jpg);
        }

        .slide2 {
            background-image: url(img/slaid2.jpg);
        }

        .slide3 {
            background-image: url(img/audi_s5_tyuning_diski_vid_sboku_97680_1920x1080.jpg);
        }

        .slide4 {
            background-image: url(img/slaid4.jpg);
        }

        .slide5 {
            background-image: url(img/slaid5.jpg);
        }

        .wrapper .controls {
            left: 50%;
            margin-left: -98px;
            position: absolute;
        }

        .wrapper label {
            cursor: pointer;
            display: inline-block;
            height: 8px;
            margin: 25px 12px 0 16px;
            position: relative;
            width: 8px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
        }

        .wrapper label:after {
            border: 2px solid #ddd;
            content: " ";
            display: block;
            height: 12px;
            left: -4px;
            position: absolute;
            top: -4px;
            width: 12px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
        }

        .slides {
            height: inherit;
            opacity: 0;
            position: absolute;
            width: inherit;
            z-index: 0;
            -webkit-transform: scale(1.5);
            -moz-transform: scale(1.5);
            -o-transform: scale(1.5);
            transform: scale(1.5);
            -webkit-transition: transform ease-in-out .5s, opacity ease-in-out .5s;
            -moz-transition: transform ease-in-out .5s, opacity ease-in-out .5s;
            -o-transition: transform ease-in-out .5s, opacity ease-in-out .5s;
            transition: transform ease-in-out .5s, opacity ease-in-out .5s;
        }

        #slide1:checked~.slider>.slide1,
        #slide2:checked~.slider>.slide2,
        #slide3:checked~.slider>.slide3,
        #slide4:checked~.slider>.slide4,
        #slide5:checked~.slider>.slide5 {
            opacity: 1;
            z-index: 1;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
        }

        .log {
            width: 150px;
        }
    </style>
</head>

<body class="animsition">
    <?php
    require_once "config/appvars.php";
    require_once "config/connectionvars.php";
    ?>



    <header class="main-header">
        <div class="container">
            <div class="logo">
                <a href="index_user.php"><img src="img/log.png" class="log" alt="logo"></a>
            </div>

            <div class="menu">
                <!-- desktop navbar -->
                <nav class="desktop-nav">
                    <ul class="first-level">
                        <li><a href="register.php" class="animsition-link">Регистрация</a></li>
                        <li><a href="login.php" class="animsition-link">Войти</a></li>

                    </ul>
                </nav>
                <!-- mobile navbar -->
                <nav class="mobile-nav"></nav>
                <div class="menu-icon">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </header>

    <div class="site-hero">
        <ul class="slides">
            <li>
                <!-- <div><span class="small-title uppercase montserrat-text">salon</span></div>
                <div class="big-title uppercase montserrat-text">MOTORS</div> -->
                <p></p>


            </li>

        </ul>
    </div>


    <br><br><br><br>

    <div class="container">

        <div class="wrapper">
            <input type="radio" name="point" id="slide1" checked>
            <input type="radio" name="point" id="slide2">
            <input type="radio" name="point" id="slide3">
            <input type="radio" name="point" id="slide4">
            <input type="radio" name="point" id="slide5">
            <div class="slider">
                <div class="slides slide1"></div>
                <div class="slides slide2"></div>
                <div class="slides slide3"></div>
                <div class="slides slide4"></div>
                <div class="slides slide5"></div>
            </div>
            <div class="controls">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
                <label for="slide5"></label>
            </div>
        </div>




        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" style="text-align:right">
                    <div class="row">

                        <ul class="social-icons" style="margin-top:30px;float:right">
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-youtube"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
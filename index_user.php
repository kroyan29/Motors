<?php
session_start();
require_once 'config/appvars.php';
require_once 'config/connectionvars.php';



if (!isset($_SESSION['user_login']))    //проверьте, неавторизованный пользователь не имеет доступа в "welcome.php " страница
{
    header("location: index.php");
}

$id = $_SESSION['user_login'];

$select_stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
$select_stmt->execute(array(":uid" => $id));

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['user_login'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="index.css" type="text/css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/log.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Motors</title>
        <style>
            .log {
                width: 150px;
            }

            .vid {

                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -9999;
            }

            .im {
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
                 
                    <nav class="desktop-nav">
                        <ul class="first-level">
                            <?
                            if ($row['rol'] == "admin")
                            echo '<li><a href="admin_redakt.php" class="animsition-link"> =>  АДМИНИСТРИРОВАНИЕ</a></li>';
                            ?>
                            <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                            <li><a href="news.php" class="animsition-link">Новости</a></li>
                            <li><a href="bank.php" class="animsition-link">Банк</a></li>
                            <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                            <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                            <li><a href="viewprofile.php" class="animsition-link"><?= $_SESSION['username']; ?></a></li>

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
                    <div><span class="small-title uppercase montserrat-text">salon</span></div>
                    <div class="big-title uppercase montserrat-text">MOTORS</div>
                    <p></p>
                </li>

            </ul>
        </div>
        <div class="container">
            <div class="agency">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                        <img src="img/brabus_b63s_mercedes_benz_g_class_6x6_94056_1920x1080.jpg" alt="image">
                        <!-- <video autoplay loop muted class="vida" id="vid">
                            <source src="video/y2meta.com-Porsche GT3 RS _ 4K Cinematic _ D&C Motor Company-(1080p).mp4" type="video/mp4">
                        </video> -->
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="section-title">
                            <span>Отношения на всю жизнь</span>
                        </div>
                        <p><?php
                            $stmt = $pdo->prepare('SELECT * FROM opisanie WHERE id_opisan = 1   ');
                            $stmt->execute();
                            while ($row = $stmt->fetch()) {
                                echo "<p>" . $row['name_opisan'] . "";
                            }
                            ?>
                        </p>
                        <a href="#" class="btn green" style="float:right;margin-top:30px"><span>Читать далее</span></a>
                    </div>
                </div>
            </div>
        </div><br><br>
        <video autoplay loop muted class="vid" id="vid">
            <source src="video/car.mp4" type="video/mp4">
        </video>
        <br><br>
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <span>Почему нужно выбрать нас</span>
                        <p>Адекватная оценка преимуществ и недостатков бизнеса, проведенная перед тем, как открыть автосалон с нуля, поможет сделать правильный выбор и определить свои реальные возможности.
                        </p>
                    </div>
                </div>

                <div class="col-md-7 col-sm-12 services-left wow fadeInUp">
                    <div class="row" style="margin-bottom:50px">
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <i class="icon ion-ios-infinite-outline"></i>
                                <span class="montserrat-text uppercase service-title">
                                    Неограниченные возможности</span>
                                <ul>
                                    <li>брендинг</li>
                                    <li></li>


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <i class="icon ion-ios-shuffle"></i>
                                <span class="montserrat-text uppercase service-title">дизайн &amp; разработка</span>
                                <ul>
                                    <li>
                                        Развитие концепции</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <i class="icon ion-ios-cart-outline"></i>
                                <span class="montserrat-text uppercase service-title">ЭЛЕКТРОННАЯ КОММЕРЦИЯ</span>
                                <ul>
                                    <li>Дизайн &amp;
                                        копирайтинг</li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <i class="icon ion-ios-settings"></i>
                                <span class="montserrat-text uppercase service-title">
                                    настраиваемый дизайн</span>
                                <ul>
                                    <li>
                                        Пользовательский опыт</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-5 col-sm-12 services-right wow fadeInUp" data-wow-delay=".1s">
                    <div class="row">
                        <img src="img/automobile-gc75df7f15_1920.jpg" alt="image">
                        <!-- <video autoplay loop muted class="vida" id="vid" alt="image">
                            <source src="video/y2meta.com-Trailer 2019 Audi RS 7 Sportback _ a high-performance coupé-(1080p).mp4" type="video/mp4">
                        </video> -->
                    </div>
                </div>

            </div>
        </section>
        <br>
        <br><br>


        <br><br>
        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <span>Инвентарь</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>


                <!-- categories  -->
                <div class="col-md-3">
                    <div class="row categories-grid wow fadeInLeft">



                    </div>
                </div>

                <!-- all works -->
                <div class="col-md-9">
                    <div class="row portfolio_container">
                        <!-- single work -->
                        <div class="col-md-4 photography">
                            <a href="merc.php" class="portfolio_item work-grid wow fadeInUp">
                                <img src="img/logo/merc.png" class="im" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span>Mercedes-Benz</span>
                                        <em>Фотокартины</em>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="porsche.php" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                                <img src="img/logo/porsche.png" class="im" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span>Porsche</span>
                                        <em>Фотокартины</em>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 ads graphics">
                            <a href="ferrari.php" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".3s">
                                <img src="img/logo/ferrari.png" class="im" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">

                                        <span>Ferrari</span>
                                        <em>Фотокартины</em>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->
                        <br><br>
                        <!-- single work -->
                        <div class="col-md-4 fashion ads">
                            <a href="audi.php" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".4s">
                                <img src="img/logo/audii.png" class="im" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span>Audi</span>
                                        <em>Фотокартины</em>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 graphics ads">
                            <a href="rolls.php" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".5s">
                                <img src="img/logo/rolls.png" class="im" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">

                                        <span>Rolls Royce</span>
                                        <em>Фотокартины</em>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->
                        <br><br>
                        <!-- single work -->
                        <div class="col-md-4 logo web photography">
                            <a href="tesla.php" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".6s">
                                <img src="img/logo/tesla.png" class="im" alt="image">

                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span>Tesla</span>
                                        <em>Фотокартины</em>
                                    </div>
                                </div>

                            </a>
                        </div>


                        <!-- single work -->

                        <!-- end single work -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- all works end -->
            </div>
            <!-- end container -->
        </section>
        <br><br> <br><br>

        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                                <li><a href="about.html" class="animsition-link">Новости</a></li>
                                <li><a href="bank.php" class="animsition-link">Банк</a></li>
                                <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                                <li><a href="logout.php" class="animsition-link">Выйти</a></li>
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











    <?php

} else {
    $row['username'] = 'Гость';
}
    ?>

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/smoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <script type="text/javascript" charset="utf-8">
        $(window).load(function() {
            new WOW().init();

            // initialise flexslider
            $('.site-hero').flexslider({
                animation: "fade",
                directionNav: false,
                controlNav: false,
                keyboardNav: true,
                slideToStart: 0,
                animationLoop: true,
                pauseOnHover: false,
                slideshowSpeed: 4000,
            });


            // initialize isotope
            var $container = $('.portfolio_container');
            $container.isotope({
                filter: '*',
            });

            $('.portfolio_filter a').click(function() {
                $('.portfolio_filter .active').removeClass('active');
                $(this).addClass('active');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 500,
                        animationEngine: "jquery"
                    }
                });
                return false;
            });
        });
    </script>
    </body>

    </html>
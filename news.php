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
    <html>

    <head>
        <title>Motors - Новости</title>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/log.png">
        <meta name="author" content="Amine Akhouad">
        <meta name="description" content="AKAD is a creative and modern template for digital agencies">

        <!-- STYLES -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .log {
                width: 150px;
            }
        </style>
    </head>

    <body class="animsition">
        <!-- HEADER  -->
        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="index_user.php"><img src="img/log.png" class="log" alt="logo"></a>
                </div>
                <div class="menu">
                    <!-- desktop navbar -->
                    <nav class="desktop-nav">
                        <ul class="first-level">
                            <?
                            if ($row['rol'] == "admin")
                                echo '<li><a href="admin_redakt.php" class="animsition-link"> =>  АДМИНИСТРИРОВАНИЕ</a></li>';
                            ?>
                            <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                            <li><a href="bank.php" class="animsition-link">Банк</a></li>
                            <li><a href="contacts.php" class="animsition-link">Контакты</a></li>
                            <li><a href="logout.php" class="animsition-link">Выйти</a></li>
                            <li><a href="viewprofile.php" class="animsition-link"><?= $row['username']; ?></a></li>

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

        <!-- HERO SECTION  -->
        <div class="site-hero_2">
            <div class="page-title">
                <div class="big-title montserrat-text uppercase">Новости</div>
                <div class="small-title montserrat-text uppercase">Интересные факты про машин</div>
            </div>
        </div>


        <!-- PORTFOLIO -->
        <section class="portfolio">
            <div class="container">
                <!-- categories  -->
                <div class="col-md-3">
                    <div class="row categories-grid wow fadeInLeft">
                        <span class="montserrat-text uppercase"></span>

                        <nav class="categories">
                            <ul class="portfolio_filter">
                                <li><a href="" class="active" data-filter="*">
                                        ВСЕ</a></li>
                                <li><a href="" data-filter=".photography">
                                        Легенды</a></li>
                                <li><a href="" data-filter=".logo">Новые</a></li>
                                <li><a href="" data-filter=".graphics">прокаченные</a></li>

                                <li><a href="" data-filter=".fashion">Модные</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- all works -->
                <div class="col-md-9">
                    <div class="row portfolio_container">
                        <!-- single work -->
                        <div class="col-md-4 photography">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp">
                                <img src="img/166453-rolls_rojs_kallinan_spofek-rolls_rojs_kullinan-rolls_royce-rolls_rojs_prizrak-legkovyye_avtomobili-1920x1080.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Больше всего автомобилей марки Rolls-Royce приходятся на душу населения в Гонконге.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".1s">
                                <img src="img/brabus_b63s_mercedes_benz_g_class_6x6_94056_1920x1080.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Первый радиоприемник был изобретен в 1929 году.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 ads graphics">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".2s">
                                <img src="img/audi_s5_tyuning_diski_vid_sboku_97680_1920x1080.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Вы платите в 8 раз больше денег за 1 литр кофе, чем за тот же литр бензина.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4  fashion ads">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".3s">
                                <img src="img/automobile-gc75df7f15_1920.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Потребовалось бы более 150 лет, чтобы добраться на автомобиле до солнца.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 graphics ads">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".4s">
                                <img src="img/165921-mercedes_g500_4x4_off_roading-1920x1080.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">56% автомобилистов моют свой автомобиль 1 раз в месяц, а 16% из них вообще не моют свой автомобиль.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 logo web photography">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".5s">
                                <img src="img/gt.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">В Шанхае (Китай) запрещены автомобили красного цвета.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 ads graphics">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".6s">
                                <img src="img/rollsroyce_vid_speredi_fary_136993_1920x1080.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Водители автомашин убивают большее число оленей, чем теже охотники.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 web fashion photography">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".7s">
                                <img src="img/porsche_cayen_white.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Средняя скорость движения автомобилей в 1972 году была приблизительно 96 км/ч, а к 1982 году она упала до 27 км/ч.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".8s">
                                <img src="img/audiiiiiii.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">На каждого жителя США на данный период времени приходится 1 автомобиль.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay=".9s">
                                <img src="img/gidfon.com avto_fara_dvizhenie_dorozhnyy_zator_skachat_zastavku.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Первая автомобильная гонка, проводившаяся в США состоялась в 1895 году. Средняя скорость машин составила 115 км/ч.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay="1s">
                                <img src="img/audi_r8_1027629.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">В Швейцарии был выписан самый большой штраф за превышение скорости, который составил 1 млн. долларов США.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay="1.1s">
                                <img src="img/bradyga.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Каждый водитель, останавливаясь на красный свет светофора проводит в машине примерно 2 недели своей жизни.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay="1.2s">
                                <img src="img/tesla_model_x.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">15 декабря 2010 года в автомобиль модели Smart вместилось 19 человек.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->

                        <!-- single work -->
                        <div class="col-md-4 fashion logo">
                            <a href="single-project.html" class="portfolio_item wow fadeInUp" data-wow-delay="1.3s">
                                <img src="img/porsche_macan.jpg" alt="image">
                                <div class="portfolio_item_hover">
                                    <div class="item_info">
                                        <span style="font-size: 12px;">Автомобильные подушки безопасности убивают 1 (одного) из 22 человеческих жизней, которые эти подушки спасают.</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single work -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- all works end -->
            </div>
            <!-- end container -->
        </section>
        <!-- portfolio -->




        <!-- FOOTER -->
        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>
                                <li><a href="news.php" class="animsition-link">Новости</a></li>
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

        <!-- SCRIPTS -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                new WOW().init();
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
    <? } ?>
    </body>

    </html>
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
        <link rel="shortcut icon" href="img/log.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">

        <title>Motors - Mercedes-Benz</title>
        <style>
            .log {
                width: 100px;
            }

            .im {
                width: 500px;
            }

            .confet {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr;

                grid-template-areas: " . con1 . confes . con2 "
                    " . . con3 . . ";
                background-color: #bebebe;
                padding: 20px;
                width: 100%;


            }

            .confetik1 {
                grid-area: 'con1';
            }

            .confesos {
                grid-area: 'confes';
            }

            .confetik2 {
                grid-area: 'con2';
                float: right;

            }

            .confetik3 {
                grid-area: 'con3';
            }
        </style>
    </head>

    <body class="animsition">

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
                            <li><a href="news.php" class="animsition-link">Новости</a></li>
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
        <div class="site-hero_2">
            <div class="page-title">
                <div class="big-title montserrat-text uppercase">Mercedes-Benz</div>
                <div class="small-title montserrat-text uppercase">Фотокартины</div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="section-title">
                    <span>История</span>
                    <p>История марки <b>Mercedes-Benz</b> слагается из историй двух известных немецких автомобильных компаний — <b>Benz & Cie</b> - основана <b>Карлом Бенцем</b> в 1883 году. <b>Daimler-Motoren-Gesellschaft</b> (основана <b>Готлибом Даймлером</b> в 1890 году). Обе компании развивались самостоятельно до 1926 года, когда они объединились в единый концерн <b>Daimler-Benz</b>, впоследствии переименованный в <b>Daimler AG</b>.</p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <img src="img/mercedes_znachok_tsvety_buket_104031_1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                        <img src="img/mercedes_vnedorozhnik_chernyj_196614_1920x1080.jpg" class=" wow fadeInUp" style="margin-bottom:30px" /><br>
                        <img src=" img/mercedes-benz-g4ac64b0af_1920.jpg" class=" wow fadeInUp" style="margin-bottom:30px" />
                    </div>
                    <div class="col-md-4">
                        <p>
                            Mercedes-Benz — торговая марка и одноимённая компания — производитель легковых автомобилей премиального класса, грузовых автомобилей, автобусов и других транспортных средств, входящая в состав немецкого концерна «Mercedes-Benz Group». Является одним из самых узнаваемых автомобильных брендов во всём мире. Штаб-квартира Mercedes-Benz находится в Штутгарте, Баден-Вюртемберг, Германия.

                            Наименование торговой марки было принято в 1926 году в результате слияния двух конкурирующих фирм, Benz & Cie. (основана Карлом Бенцем) и Daimler-Motoren-Gesellschaft (основана Готлибом Даймлером), в единый концерн — Daimler-Benz. Название бренда образовано от двух наиболее значимых автомобилей объединённых компаний — Mercedes 1901 года и Benz Patent-Motorwagen 1886 года.

                            В 2018 году бренд Mercedes-Benz оценивался в 48,601 млрд долларов, удерживая второе место (после Toyota) среди компаний-производителей автомобилей и восьмое место среди всех брендов мира. По оценке BrandZ, в 2018 году марка входила в список Top 100 Most Valuable Global Brands, где занимала 46 место среди наиболее дорогих брендов со стоимостью в 25,684 млрд долларов. В 2019 году бренд Mercedes-Benz оценивался в 60,355 млрд долларов, тем самым занимая первое место в рейтинге компаний-производителей автомобилей.
                        </p>
                        <ul class="list" style="margin:30px 0">
                            <li>Веб дизайт</li>
                            <li>
                                Фронтенд разработка</li>
                            <li>Бэкэнд разработка</li>
                            <li>Поисковая оптимизация</li>
                        </ul>
                        <h5 class="uppercase montserrat-text">Поделится</h5>
                        <ul class="social-icons" style="margin-top:20px;">
                            <li><a href="https://ru-ru.facebook.com/" data-social="fb"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="https://twitter.com/?lang=ru" data-social="tw"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="javasript:void(0);" data-social="ln"><i class="icon ion-social-linkedin"></i></a></li>
                            <li><a href="javasript:void(0);" data-social="pt"><i class="icon ion-social-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video -->
        <div class="container">
            <div class="light-gray-section wow fadeInUp" style="padding:15px 30px">
                <div class="row">
                    <p class="italic" style="float:left;line-height:50px;margin:0">
                        <?php
                        echo '<div class="col-md-4 photography">
                                <a href="merc.php" class="portfolio_item work-grid wow fadeInUp">';
                        $ros = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and marka.id_marka= 1 and model.id_model = 2  ORDER BY marka.marka_name");
                        foreach ($ros as $rows) {
                            echo "<div class='griid'> <img src='" . $rows['foto_model'] . "' class='im' alt='image'>      <div class='portfolio_item_hover'>
                                        <div class='item_info'>  <span>        <p><hr> <b> <h3>" . $rows['model_name'] . "</h3></b><img src='" .  "' class='images'>" . "  <p><h4>Цена: <b>" . $rows['price'] . "$</b></h4></p><br>" . "</span> <br> <em>" . $rows['year'] . "г.</em>
                                        </div>
                                    </div>
                                    </div> </a> ";
                        }
                        ?>
                    </p>
                    <a href="view_avto.php" class="btn green" style="float:right"><span>Смотреть больше</span></a>
                </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="light-gray-section wow fadeInUp" style="padding:15px 30px">
                <div class="row">
                    <p class="italic" style="float:left;line-height:50px;margin:0">
                        
                    </p>
                    <a href="view_avto.php" class="btn green" style="float:right;"><span></span></a>
                </div>
            </div>
        </div> -->

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
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.social-buttons.min.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                new WOW().init();

                $('.project_images').flexslider({
                    directionNav: false,
                    controlNav: false
                });

                $("[data-social]").socialButtons();
            });
        </script>
    <? } ?>
    </body>

    </html>
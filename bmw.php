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

    <title>Motors - BMW</title>
    <style>
        .log {
            width: 100px;
        }

        .im {
            width: 500px;
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
            <div class="big-title montserrat-text uppercase">BMW</div>
            <div class="small-title montserrat-text uppercase">Фотокартины</div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="section-title">
                <span>История</span>
                <p>Промышленная фирма была основана <b>Карлом Фридрихом Раппом</b> в октябре 1916 года, официально компания <b>BMW</b> была зарегистрирована 20 июля 1917 года, но первоначально — как производитель авиационных двигателей, <b>Bayerische Flugzeug-Werke</b>. Округ <b>Мюнхена — Milbertshofen</b> был выбран потому, что он располагался близко от <b>Flugmaschinenfabrik Густава Отто</b> — немецкого производителя самолётов.</p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <img src="img/166591-bmw-legkovyye_avtomobili-sportkar-kompaktnyj_avtomobil-a_segmenta-1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    <img src="img/bmw_vid_sboku_avtomobil_135172_1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    <img src="img/bmw_avtomobil_bamper_191131_1920x1080.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                </div>
                <div class="col-md-4">
                    <p>
                        BMW — немецкий производитель автомобилей, мотоциклов, двигателей, а также велосипедов. Председателем компании с 2006 по 2015 год был Норберт Райтхофер, с мая 2015 года — Харальд Крюгер, а с 18 июля 2019 года — Оливер Ципсе. Главный дизайнер — Йозеф Кабан. Девиз компании — «С удовольствием за рулём». Для англоязычных стран был придуман также девиз — «Идеальная машина для вождения».

                        По-русски название «BMW» произносится «бэ-эм-вэ́», что близко к немецкому произношению; изредка встречается написание «БМВ». Существует также несколько «неофициальных» названий: из англоязычного произношения аббревиатуры «би-эм-дабл-ю» для мотоциклов фирмы исторически сложилось название «бимер», для автомобилей — похожее, но не равнозначное «биммер». В России для обозначения марки могут также применяться названия «бэха», «биммер», «бумер», в Греции — «beba», в арабских странах — «BM». Автомобили также могут называться соответственно их серии, например для 5-й серии — «пятёрка».
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
                    $ros = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and marka.id_marka= 4 and model.id_model = 7 ORDER BY marka.marka_name");
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
</body>

</html>
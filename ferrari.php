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

    <title>Motors - Ferrari</title>
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
            <div class="big-title montserrat-text uppercase">Ferrari</div>
            <div class="small-title montserrat-text uppercase">Фотокартины</div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="section-title">
                <span>История</span>
                <p> <b>Ferrari</b> — итальянская компания, выпускающая спортивные и гоночные автомобили, базирующаяся в <b>Маранелло.</b> Основана в <b>1947 году Энцо Феррари как Scuderia Ferrari,</b> компания спонсировала гонщиков и производила гоночные автомобили <b>до 1947 года. С 1947 года</b> начала выпуск спортивных автомобилей, разрешённых к использованию на дорогах общего пользования, под маркой <b>«Ferrari S.p.A.».</b> На протяжении всей своей истории, компания участвует в различных гонках, особенно в Формуле-1, где она имеет наибольший успех. <b>Эмблема «Феррари» — гарцующая лошадь на жёлтом фоне.</b> Традиционный цвет автомобилей — красный, но компания выпускает автомобили и других цветов.</p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <img src="img/img1.akspic.ru-ferrari_f50-legkovyye_avtomobili-enzo_ferrari-ferrari-ferrari_f40-5120x2880.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    <img src="img/img3.akspic.ru-ferrari_f40-ferrari-legkovyye_avtomobili-ferrari_458-sportkar-3840x2160.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                    <img src="img/img2.akspic.ru-superkar-zhenevskij_avtosalon-laferrari-ferrari-ferari-2560x1600.jpg" class="wow fadeInUp" style="margin-bottom:30px" />
                </div>
                <div class="col-md-4">
                    <p>
                        Компания была основана в 1929 году гонщиком, конструктором и испытателем автомобилей «Альфа-Ромео» Энцо Феррари. Первоначально она производила различное оборудование для автомобилей. Сделанные компанией автомобили выпускались под маркой «Альфа-Ромео». С этой компанией у Феррари был договор. Первый автомобиль, носящий уже собственно имя «Феррари» появился в 1946. Это была модель Ferrari 125, с мощным 12-цилиндровым алюминиевым двигателем, призванная воплотить в жизнь мечту её создателя: придать обыкновенному дорожному автомобилю свойства гоночного без ущемления комфортабельности. В качестве торговой марки фирмы Энцо Феррари избрал гарцующего жеребца на жёлтом фоне.
                        <br>
                        В 1951 появляется этапная модель 340 America с двигателем, первоначально разработанным для Ferrari GT с рабочим объёмом 4,1 литра. В 1953 году эта же машина оснащается двигателем объёмом 4,5 литра и получает новое имя — 375 America. В том же году «Феррари» представляет 250 Europa, с трехлитровым двигателем.
                        <br>
                        Феррари принадлежат самые запоминающиеся машины 60-х годов XX века: 250 GT в 1960 был преобразован в фастбек 250 GTE с кузовом «2+2», элегантный и пользующийся популярностью, на базе которого в 1964 был создан 330 GT «2+2» с четырёхлитровым мотором и оригинальными «косящими» фарами. С 1962 по 1964 на базе 250 GT был построен один из самых значимых автомобилей в истории — 250 GTO («Gran Turismo Omologata»). Всего было выпущено 39 автомобилей, обладающими 3-х литровым двигателем V12 мощностью 300 л. с., имеющая 5-скоростную коробку передач. Вес автомобиля составлял 1100 кг, колесная база — 2400 мм, а максимальная скорость более 283 км/ч.
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
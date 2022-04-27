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
        <title>Motors - Контакт</title>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/log.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .log {
                width: 150px;
            }

            .input-group-btn {
                right: -40px;
                background-color: #ca7bee;

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
                            <li><a href="news.php" class="animsition-link">Новости</a></li>
                            <li><a href="bank.php" class="animsition-link">Банк</a></li>
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
                <div class="big-title montserrat-text uppercase">Контакты</div>
                <div class="small-title montserrat-text uppercase">Чечня на связи</div>
            </div>
        </div>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">


                        <h4 class="montserrat-text uppercase" style="margin-top:100px">Информация о нас</h4>
                        <p>У нас по весь городе есть филиалы, если у вас возникли вопросы то вы можете званить по этими номерами</p>

                        <form method="get" class='margin-left-1em' role='search'>
                            <div class='input-group col-md-6 pull-left margin-right-1em'>

                                <?php
                                $res = $pdo->query("SELECT id_filial,name_filial FROM filial ORDER BY id_filial", PDO::FETCH_LAZY); ?>

                                <select class='form-control' name='filial' style='width:200px;height:50px;' id='category_id'>
                                    <option>Выбрать филиал...</option> -->
                                    <?php
                                    foreach ($res as $row) {
                                        echo "<option value='" . $row['id_filial'] . "'>" . $row['name_filial'] . "</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                    <div class='input-group-btn'>
                                        <button class='btn btn-primary' type='submit' name='fil'>&#9742</button>
                                    </div>
                            </div>
                        </form>
                        <br><br>

                        <?php


                        if (isset($_GET['fil'])) {
                            $a = $_GET["filial"];

                            $res = $pdo->query("SELECT * FROM filial WHERE id_filial = $a", PDO::FETCH_LAZY); {
                                foreach ($res as $row) {
                                    echo "<br><p>Филиал ООО '" . $row['name_filial'] . "'<br>Адрес: " . $row['adrec_filial'] . "; Тел. " . $row['phone_filial'] . "<br>Регистрационный номер: " . $row['reg_number'];
                                }
                            }
                        }

                        // подключаем файлы для работы с базой данных и файлы с объектами 


                        ?>




                        <ul class="social-icons" style="margin-top:30px;">
                            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-youtube"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
                        </ul>
                    </div><!-- end col -->

                    <div class="col-md-6">
                        <div style="width:100%"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2279.282634297513!2d61.43393125126819!3d55.160831144862215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5ed500dc699a7%3A0x7e6c6e7be772132f!2z0L_RgC4g0JvQtdC90LjQvdCwLCDQp9C10LvRj9Cx0LjQvdGB0LosINCn0LXQu9GP0LHQuNC90YHQutCw0Y8g0L7QsdC7Lg!5e0!3m2!1sru!2sru!4v1648318205743!5m2!1sru!2sru" width="600" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>

                </div>
            </div>
        </section>


        <!-- newsletter -->

        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="view_avto.php" class="animsition-link">Автомобили</a></li>

                                <li><a href="about.html" class="animsition-link">Новости</a></li>
                                <li><a href="bank.php" class="animsition-link">Банк</a></li>

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
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script type="text/javascript">
            // initialize google maps
            google.maps.event.addDomListener(window, 'load', initialize);

            function initialize() {
                var mapOptions = {
                    zoom: 11,
                    center: new google.maps.LatLng(40.6700, -73.9400), // New York
                    scrollwheel: false,
                    styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#e9e9e9"
                        }, {
                            "lightness": 17
                        }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f5f5f5"
                        }, {
                            "lightness": 20
                        }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ffffff"
                        }, {
                            "lightness": 17
                        }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#ffffff"
                        }, {
                            "lightness": 29
                        }, {
                            "weight": 0.2
                        }]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#ffffff"
                        }, {
                            "lightness": 18
                        }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#ffffff"
                        }, {
                            "lightness": 16
                        }]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f5f5f5"
                        }, {
                            "lightness": 21
                        }]
                    }, {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#dedede"
                        }, {
                            "lightness": 21
                        }]
                    }, {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                            "visibility": "on"
                        }, {
                            "color": "#ffffff"
                        }, {
                            "lightness": 16
                        }]
                    }, {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "saturation": 36
                        }, {
                            "color": "#333333"
                        }, {
                            "lightness": 40
                        }]
                    }, {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }, {
                            "lightness": 19
                        }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#fefefe"
                        }, {
                            "lightness": 20
                        }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#fefefe"
                        }, {
                            "lightness": 17
                        }, {
                            "weight": 1.2
                        }]
                    }]
                };

                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    icon: 'assets/img/map.png',
                    title: 'Find us here!'
                });
            }
            $(window).load(function() {
                new WOW().init();
                $("#map").css("height", $("#map").parent().parent().height() + "px");
            });
        </script>
    <? } ?>
    </body>

    </html>
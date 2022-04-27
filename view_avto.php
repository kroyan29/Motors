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
        <title>Motors - View Auto</title>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <meta name="description" content="">
        <link rel="shortcut icon" href="img/log.png" type="image/png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animsition.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .log {
                width: 150px;
            }

            .images {
                width: 400px;
            }

            .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 15px;
                border-radius: 5px;
                background: #d3d3d3;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
            }

            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 15px;
                height: 15px;
                border-radius: 50%;
                background: #ca7bee;
                cursor: pointer;
            }

            .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #ca7bee;
                cursor: pointer;
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

        <!-- HERO SECTION  -->
        <div class="site-hero_2">
            <div class="page-title">
                <div class="big-title montserrat-text uppercase">Автомобили</div>
                <div class="small-title montserrat-text uppercase">В ассортименте есть 6 марок автомобилей</div>
            </div>
        </div>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div class="single_post">
                            <div class="post_media">
                                <!-- <img src="img/city_motors.jpg" alt="post image"> -->
                            </div>
                            <div class="post_title">


                            </div>
                            <p>
                            <form method="get" class='margin-left-1em' role='search'>
                                <div class='input-group col-md-6 pull-left margin-right-1em'>





                                    <?php
                                    $res = $pdo->query("SELECT * FROM marka", PDO::FETCH_LAZY);
                                    foreach ($res as $row) {
                                        echo "<center><h2 class='montserrat-text uppercase'>" . $row['marka_name'] . "</h2></center> <div class='wrapper'>";
                                        $a = $row['id_marka'];
                                        $ris = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and marka.id_marka=$a ORDER BY marka.marka_name");
                                        foreach ($ris as $rows) {
                                            echo "<p><hr> <b> <h3>" . $rows['year'] . " " . $rows['model_name'] . "</h3></b><img src='" . $rows['foto_model'] . "' class='images'>" . "  <br>";
                                            echo "<form action='view_avto2.php' method='get'><br><p>
                                        <a href='view_avto2.php?auto=" . $rows['id_model'] . "' class='btn btn-primary left-margin' name='auto'>";
                                            echo "П&#10026;ДР&#10026;БНЕЕ";
                                            echo "</a></p></form>";
                                            $_SESSION['number_id'] = $rows['id_model'];
                                          
                                        }
                                        echo "</div>";
                                    }
                                    ?>
                                    </p>

                                </div>
                            </form>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">


                                </div>
                            </div>
                        </div>

                        <div class="pages_pagination">
                            <!--                         
                        <a href="" class="prev"><i class="icon ion-arrow-left-c"></i></a>
                        <a href="" class="next"><i class="icon ion-arrow-right-c"></i></a> -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="input_2">
                                    <?php
                                    echo "<form role='search' action='searchauto.php' class='margin-right-1em'>";
                                    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
                                    $search_value = isset($search_term) ? "value='{$search_term}'" : "";
                                    echo "<input type='text' class='form-control'  style='width: 250px; height:50px;'placeholder='Введите название машины' name='s' id='srch-term' required {$search_value} />";
                                    echo "<div class='input-group-btn'>";
                                    echo "<button class='btn btn-primary' type='submit' style=''>Search</button>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</form>";
                                    ?>

                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget_title">Автомобили</div>
                                <div class="tab">
                                    <nav>
                                        <a href="#audi">Audi</a>
                                        <a href="#bmw">BMW</a>
                                        <a href="#mers">Mercedes-Benz</a>
                                        <a href="#pors">Porsche</a>
                                        <a href="#rolls">Rolls Royce</a>
                                        <a href="#tesla">Tesla</a>
                                        <!-- <div class="bottom-line"></div> -->
                                    </nav>
                                    <div class="shown">
                                        <div class="related_post">
                                            <div class="thumb"></div>
                                            <div class="slidecontainer"><label for="" class="widget_title">Цена
                                                    <input type="range" min="1" max="100" step="1" value="0" class="slider" id="myRange"></label>
                                            </div>



                                        </div>
                                        <div class="related_post">
                                            <div class="thumb"></div>
                                            <label for="" class="widget_title">Дата
                                                <br><input type="date" class="polzhunok">
                                            </label>
                                        </div>

                                    </div>
                                    <div class="tab_single">

                                    </div>
                                </div>
                            </div>

                            <div class="widget wow fadeInUp">
                                <div class="widget_title">Количество машин одной марки</div>
                                <ul class="list_2">
                                    <?php

                                    $stmt = $pdo->query("SELECT marka.marka_name, COUNT(model.marka_id) AS county FROM marka, model WHERE marka.id_marka = model.marka_id GROUP BY marka.marka_name", PDO::FETCH_LAZY);
                                    foreach ($stmt as $row) {

                                        echo "<li><a href=''>";
                                        echo $row['marka_name'] . "<span>" . $row['county'];
                                        echo "</span></a></li>";
                                    }
                                    ?>

                                </ul>
                            </div>

                            <div class="widget wow fadeInUp">
                                <div class="widget_title"></div>

                            </div>

                            <div class="widget wow fadeInUp">

                            </div>

                            <div class="widget wow fadeInUp">
                                <div class="widget_title"></div>
                                <ul class="list_2">
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <footer class="main-footer wow fadeInUp">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>

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

        <!-- SCRIPTS -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                new WOW().init();
            });
        </script>
    <? } ?>

    </body>

    </html>
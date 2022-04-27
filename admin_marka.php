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
        <title>Motors - Админ</title>
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



            .glav {
                margin-right: 50px;
                margin-left: 50px;
            }



            table,
            tbody,
            tr,
            td,
            th {
                border: 0.3px groove black;
                border-collapse: collapse;
                margin: auto;
                padding: 10px;
            }






            .btn {
                font-size: 14px;
                padding: 10px;

                padding-top: -120px;

                margin-left: 5%
            }



            .cen_right {
                margin-left: 900px;
                margin-top: -395px;

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
                            <li><a href="index_user.php" class="animsition-link">Назад на главную</a></li>
                            <li><a href="moder_comm.php" class="animsition-link">Модерация коментарий</a></li>



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

        <br><br><br><br><br><br><br>
        <div class="glav">
            <center>
                <button class="btn"><a href="admin_redakt.php" style="font-size:18px">Модели</a></button>
                <button class="btn"><a href="admin_marka.php" style="font-size:18px">Марки</a></button>
            </center>
        </div>

        <br>
        <div class="glav">
            <form action="" method="post" name="panel">
                <fieldset>
                    <center>
                        <input type="submit" name="but" class="btn" value="Вывести">
                        <input type="submit" name="but" class="btn" value="Добавить запись">
                        <input type="submit" name="but" class="btn" value="Редактировать запись">
                        <input type="submit" name="but" class="btn" 4 value="Удалить запись">
                    </center>
                </fieldset>
            </form>
            <br><br>
        </div>
        <?php


        $action = $_POST['but'];


        switch ($action) {
            case "Вывести":
                echo "<table class = 'tablshow'>
    <thead><tr><th>№</th><th>Марка</th><th>Лого марки</th></tr></thead>";
                $stmt = $pdo->prepare('SELECT * FROM marka ORDER BY marka.id_marka');
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<tbody><tr><td>" . $row['id_marka'] . "</td>
        <td>" . $row['marka_name'] . "</td>
        <td><img src='" . $row['image'] . "' style='width: 50px;'></td>
        </tr>";
                }
                echo "<tbody></table>";
                break;

            case "Добавить запись":
        ?>

                <form action="" method="post" name="formNew" id="formNew">
                    <div class="container">
                        <fieldset>

                            <div>
                                    <p>
                                        <label for="mar">Марка: </label> <br>
                                        <input type="text" name="mar" id="mar" maxlenght="50" size="30" required>
                                    </p>
                                    <p>
                                        <label for="foto">Лого марки: </label> <br>
                                        <input type="file" name="foto" id="foto" required>
                                    </p>

                                
                            </div><br>

                            <p class="buttom_knop"><input type="submit" name="but" class="btn" value="Сохранить"></p>
                        </fieldset>
                    </div>
                </form>
            <?php
                break;
            case "Сохранить":
                $action2 = $_POST['but'];
                $marka_name = $_POST['mar'];
                $image = $_POST['foto'];


                $zapros = "INSERT INTO marka (marka_name, image) values(?,?)";
                $result = $pdo->prepare($zapros);
                $result->bindParam(1, $marka_name);
                $result->bindParam(2, $image);
                $result->execute();

                if ($result)
                    echo "<div class='messag OK'> &#9989; Инфориация занесена в БД! </div>";
                else
                    echo "<div class='messag NO'> &#9940; Ошибка! Инфориация не занесена в БД!</div>";
                break;
            case "Редактировать запись":
            ?>
                <form action="" method="post" name="formNomerEdit" id="formNomerEdit">
                    <div class="container">
                        <fieldset>

                            <p><label for="editNumer">Выведите номер модели</label>
                                <input type="text" name="editNumer" id="editNumer" maxlenght="10" size="30" required>
                            </p>
                            <input type="submit" value="Выбрать" class="btn" name="but">
                        </fieldset>

                    </div>
                </form>
                <?php
                break;
            case "Выбрать";
                $action = $_POST['but'];
                $IDNomerEdit = $_POST['editNumer'];
                $zapros = "SELECT marka_name, image FROM marka WHERE marka.id_marka=?";
                $result = $pdo->prepare($zapros);
                $result->bindParam(1, $IDNomerEdit);
                $result->execute();

                while ($stroka = $result->fetch(PDO::FETCH_ASSOC)) {
                    $id_marka = $IDNomerEdit;
                    $marka_name = $stroka['marka_name'];
                    $image = $stroka['image'];
                }
                if ($marka_name == null || $marka_name == '')
                    echo "<div class='messag NO'> &#9940; Ошибка! Нет идентификатора в БД!</div>";
                else {
                ?>
                <center>
                    <form action="" method="post">
                        <div class="container">
                            <fieldset>
                               <h2>Запись №<?php echo $id_marka; ?></h2> 
                               <br><br>
                                <p>
                                    <label for="mar">Марка: </label> <br>
                                    <input type="text" name="mar" id="mar" value="<?php echo $marka_name; ?>" required>
                                </p>
                                <p>
                                    <label for="foto">Лого марки: </label> <br>
                                    <input type="file" name="foto" id="foto" value="<?php echo $image; ?>" required>
                                </p>
                               
                                </div>
                                <input type="hidden" name="IDHid" value="<?php echo $id_marka; ?>">
                                <br>
                                <p><input type="submit" name="but" class="btn" value="Сохранить изменения"></p>
                            </fieldset>
                        </div>
                    </form></center>
                <?php
                }
                break;
            case "Сохранить изменения";
                $action4 = $_POST['but'];
                $marka_name = $_POST['mar'];
                $image = $_POST['foto'];
                $id_model = (int)$_POST['IDHid'];


                $zapros = "UPDATE marka SET marka_name=?, image=? WHERE id_marka=?";
                $result = $pdo->prepare($zapros);
                $result->bindParam(1, $marka_name);
                $result->bindParam(2, $image);
                $result->bindParam(16, $id_marka);
                $result->execute();

                if ($result)
                    echo "<div class='messag OK'> &#9989; Инфориация изменена в БД! </div>";
                else
                    echo "<div class='messag NO'> &#9940; Ошибка! Нет редактирования в БД!</div>";

                break;

            case "Удалить запись":
                ?>
                <form action="" method="post" name="formNomerDelet" id="formNomerDelet">
                    <div class="container">
                        <fieldset>

                            <p><label for="deleteNumer">Выведите номер строки</label>
                                <input type="text" name="deleteNumer" id="deleteNumer" maxlenght="10" size="30" required>
                            </p>
                            <input type="submit" value="Удалить" class="btn" name="but">
                        </fieldset>

                    </div>
                </form>
        <?php
                break;
            case "Удалить":
                $action5 = $_POST['but'];
                $delNomer = $_POST['deleteNumer'];

                $id_marka = $delNomer;
                $stmt = $pdo->prepare("SELECT * FROM marka WHERE id_marka = ?");
                $stmt->execute([$id_marka]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row['marka_name'] == '' || $row['marka_name'] == null)
                    echo "<div class='messag NO'> &#9940; Ошибка! Нет идентификатора в БД!</div>";
                else {
                    $zapros = "DELETE FROM marka WHERE id_marka=?";
                    $result = $pdo->prepare($zapros);
                    $result->bindParam(1, $delNomer);
                    $result->execute();

                    if ($result)
                        echo "<div class='messag OK'>  Информация удалена из БД успешно! </div>";

                    else
                        echo "<div class='messag NO'>  Ошибка! </div>";
                }
                break;
        }

        ?>
        </fieldset>
        </div>
        <br><br>

        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/smoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.animsition.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>

    </html>
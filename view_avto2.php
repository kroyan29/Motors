<?php
session_start();
$id = isset($_GET['auto']) ? $_GET['auto'] : die('ERROR: отсуствует ID.');
// получаем ID товара 

// подключаем файлы для работы с базой данных и файлы с объектами 
require_once 'config/database.php';
require_once 'config/connectionvars.php';
require_once 'objects/model.php';
require_once 'objects/marka.php';
require_once 'objects/comments.php';


// получаем соединение с базой данных 
$database = new Database();
$db = $database->getConnection();

// подготавливаем объекты 
$model = new Model($db);
$marka = new Marka($db);
$comments = new Comment($db);

// устанавливаем свойство ID товара для чтения 
$model->auto = $auto;

// получаем информацию о товаре 
$model->readOne();

// установка заголовка страницы 
$page_title = "Подробнее о товаре. Код №  $model->id_model";


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/animsition.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<?php
	$res = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and id_model = $id", PDO::FETCH_LAZY); {
		foreach ($res as $row) {
			echo "<title>" . $row['model_name'] . "</title>";
		}
	}

	?>
	<style>
		.ikon {
			width: 100px;
			border: 1px solid #cfcfcf;
			padding: 30px;
			border-collapse: collapse;
		}

		.images {
			width: 100px;
		}

		.table_dey,
		.tr_dey,
		.td_dey {
			padding: 30px;
			border: 1px groove #cecece;
			text-align: center;
			font-family: Montserrat, sans-serif;
		}

		.table_dey {
			width: 45%;
		}

		.asd {
			margin-left: 7%;
			margin-right: 7%;
		}

		.name_wrapper {
			padding: 20px;
			background-color: #cfcfcf;
		}

		.value {
			padding-left: 50px;
		}

		.container_slider_css {

			width: 500px;
			height: 300px;
			overflow: hidden;
			position: relative
		}

		.photo_slider_css {
			position: absolute;
			animation: round 16s infinite;
			opacity: 0;
			width: 100%
		}

		@keyframes round {
			25% {
				opacity: 1
			}

			40% {
				opacity: 0
			}
		}

		img:nth-child(1) {
			animation-delay: 12s
		}

		img:nth-child(2) {
			animation-delay: 8s
		}

		img:nth-child(3) {
			animation-delay: 4s
		}

		img:nth-child(4) {
			animation-delay: 0
		}

		@media(min-width:0px) and (max-width:320px) {
			.container_slider_css {
				width: 80%;
				height: 190px
			}
		}

		@media(min-width:321px) and (max-width:480px) {
			.container_slider_css {
				width: 80%;
				height: 190px
			}
		}

		.btn.green {
			background-color: #ca7bee;
			color: #fff;
			width: 72%;
		}

		.img_mash_vniz {
			width: 300px;
			padding: 10px;

		}

		.slider_mash {
			margin-left: 7%;
			margin-right: 7%;
			background-color: black;
			border-radius: 10px;


		}

		.img_mash_vniz_bolshoy {
			width: 907px;
			padding: 10px;
			right: 10px;

		}

		.form_otz {
			margin-left: 16%;
			margin-right: 20%;
		}

		.commens {
			margin-left: 16%;
			margin-right: 20%;
			background-color: rgb(255, 222, 179);
			padding: 20px;

		}
	</style>
</head>

<body class="animsition">
	<!-- HEADER  -->
	<header class="main-header">
		<div class="container">
			<div class="logo">
				<a href="index_user.php"><img src="img/log.png" style="width:150px;" alt="logo"></a>
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
						<li><a href="viewprofile.php" class="animsition-link"><?= $_SESSION['username']; ?></a></li>
					</ul>
				</nav>
				<!-- mobile navbar -->

			</div>
		</div>
		</div>
	</header>
	<div class="site-hero_2">
		<div class="page-title">
			<?php
			$res = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and id_model = $id", PDO::FETCH_LAZY); {
				foreach ($res as $row) {
					echo "<div class='big-title montserrat-text uppercase'>" . $row['marka_name'] . "</div>";
					echo "<div class='small-title montserrat-text uppercase'>" . $row['model_name'] . "</div>";
				}
			}


			?>
		</div>
	</div>
	<section>
		<div class="container"><?php

								$res = $pdo->query("SELECT * FROM `model`,`privod`,`marka`,`kuzov`,`color` WHERE model.privod_id = privod.id_privod and model.marka_id = marka.id_marka and model.kuzov_id = kuzov.id_kuzov and model.color_id = color.id_color and id_model = $id", PDO::FETCH_LAZY); {
									foreach ($res as $row) {

										echo "<div class='col-md-6 wow fadeInUp' data-wow-delay='.1s'>
										<div class='container_slider_css'>
										<img class='photo_slider_css' src='" . $row['foto_model4'] . "' alt=''>
										<img class='photo_slider_css' src='" . $row['foto_model3'] . "' alt=''>
										<img class='photo_slider_css' src='" . $row['foto_model2'] . "' alt=''>
										<img class='photo_slider_css' src='" . $row['foto_model'] . "' alt=''>
 
</div>
					
				</div><table class='table_dey'>
	<tr class='tr_dey'>
		<td  class='td_dey'><img src='img/ikonki/dvi.png' style='width: 50px;'><br>" . $row['obiom_dvig'] . "</td>
		<td class='td_dey'><img src='img/ikonki/karobka.png' style='width: 50px;'><br>" . $row['karob'] . "</td>
		<td class='td_dey'><img src='img/ikonki/losh.png' style='width: 50px;'><br>" . $row['moshnost'] . " л.с.</td>
    </tr>
	<tr class='tr_dey'>
		<td class='td_dey'><img src='" . $row['foto_kuzov'] . "' style='width: 50px;'><br>" . $row['kuzov_name'] . "</td>
		<td class='td_dey'><img src='img/ikonki/color.png' style='width: 50px;'><br>" . $row['color_name'] . "</td>
		<td class='td_dey'><img src='img/ikonki/probeg.png' style='width: 50px;'><br>" . $row['probeg'] . " км</td>
	</tr>
</table>
						
					

					</p>
					<div class=''>
						<div>
						<form method='get' action='anketa.php'>
							<a href='anketa.php?aut=".$row['id_model']."' class='btn green' style='width:36%;'>Купить</a>
							</form>";
							$_SESSION['number_id'] = $rows['id_model'];"
						</div>
					</div><br><br><br><br><br>
					<div class='col-md-6'>
						<div class='row'>
							<ul class='list'>
								<h3>ОБ ЭТОМ АВТОМОБИЛЕ</h3>
								<h5>" . $row['marka_name'] . " " . $row['model_name'] . "</h5>
								<h5>Цвет " . $row['color_name'] . "</h5>
								<b><h5>Цена " . $row['price'] . " $</h5><b>
							</ul>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</section>";
								?>
					<div class="asd" id="m-387150">
						<div class="text-left">
							<h4 class="js-module-heading">
								ИНФОРМАЦИЯ О ТРАНСПОРТНОМ СРЕДСТВЕ
							</h4>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<table class="fields">
									<tbody>
										<?php
										echo "<tr>
									<td class='name'>
										<div class='name_wrapper'>Год: </div>
									</td>
									<td class='value'>" . $row['year'] . "</td>
								</tr>
								<tr>
									<td class='name'>
										<div class='name_wrapper'>Марка: </div>
									</td>
									<td class='value'>" . $row['marka_name'] . "</td>
								</tr>
								<tr>
									<td class='name'>
										<div class='name_wrapper'>Модель: </div>
									</td>
									<td class='value'>" . $row['model_name'] . "</td>
								</tr>
								
									</tbody>
								</table>
							</div>
							<div class='col-xs-12 col-sm-6'>
								<table class='fields'>
									<tbody><tr>
									<td class='name'>
										<div class='name_wrapper'>Пробег: </div>
									</td>
									<td class='value'>" . $row['probeg'] . " км.</td>
								</tr><tr>
									<td class='name'>
										<div class='name_wrapper'>КП: </div>
									</td>
									<td class='value'>" . $row['karob'] . "</td>
								</tr>
										<tr>
									<td class='name'>
										<div class='name_wrapper'>Привод: </div>
									</td>
									<td class='value'>" . $row['privod_name'] . "</td>
								</tr>
									
									</tbody>
								</table>";

										?>
							</div>
						</div>

					</div>

					<!-- <div class="row">
				 <div class="section-title">
					<span>what we do</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
				</div> 
			</div> -->
					<br><br>
			<?php echo "<div class='slider_mash'>
<center>
						<div class='white_back'>
						<img class='img_mash_vniz_bolshoy' src='" . $row['foto_model'] . "' alt=''>
						<img class='img_mash_vniz' src='" . $row['foto_model2'] . "' alt=''>
						<img class='img_mash_vniz' src='" . $row['foto_model3'] . "' alt=''>
						<img class='img_mash_vniz' src='" . $row['foto_model4'] . "' alt=''>
						</div></center>
					</div>";
									}
								}
			?>
		</div>

		<?
		$x_id = $_SESSION["user_login"];
		$x_name = $_SESSION["username"];

		?>
		<form method="post" class="form_otz">
			<h2> Оставьте свой отзыв</h2>
			<table class='table table-hover table-responsive table-bordered'>
				<tr>
					<td>Отзыв на товар:</td>
					<td>
						<h3><b><u> <?= $id ?></u></b></h3>
					</td>
				</tr>
				<tr>
					<td style="width: 20%;">Имя</td>
					<td><input type='text' name='user' class='form-control' value="<?= $x_name ?>" /></td>
				</tr>
				<tr>
					<td>Тема</td>
					<td><input type='text' name='title' class='form-control' /></td>
				</tr>
				<tr>
					<td>Текст отзыва</td>
					<td><textarea name='text' class='form-control'></textarea></td>
				</tr>
				<tr>
					<td colspan="2">

						<button type="submit" class="btn btn-danger glyphicon glyphicon-eye-open "> ОТПРАВИТЬ ОТЗЫВ</button>
					</td>
				</tr>
			</table>
		</form>

		<?php
		$comments->user = $x_id;
		$comments->tovar_id = $id; //ID товара
		// если форма была отправлена (отзыв)
		if ($_POST) {
			// установим значения свойствам отзыва 


			$comments->title = $_POST['title'];
			$comments->text = $_POST['text'];

			// создание отзыва 
			if ($comments->create()) {
				echo "<div class='success' style='background-color:#a3ffb7; border:1px green solid; padding:10px; margin-left: 16%;
			margin-right: 20%;'>Отзыв отправлен на модерацию.</div>";
			} else {
				echo "<div class='danger' style='background-color:#ffa3a3; border:1px red solid; padding:10px; margin-left: 16%;
			margin-right: 20%;'>Невозможно отправить отзыв, вы не зарегистрированы.</div>";
			}
		}
		?>

		<hr>
		<?php
		$comments->com_model_id = $model->id_model;
		if ($comments->readCount() > 0) {
		?>
			<h1> Отзывы на машину <i><u> <?= $model->model_name; ?>,</u> </i> прошедшие модерацию</h1>
			<hr>
		<?php

			$stmt = $comments->readAll();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				extract($row);

				echo "<div class='commens'>";
				echo "<p>Пользователь: <b> {$user}</b></p>";
				echo "<p>Тема: <b>{$title}</b> </p>";
				echo "<p>Отзыв: {$text} </p>";
				echo "<p><b><i>Дата: {$created} </i></b></p>";
				echo "</div><hr>";
			}
		} else
			echo "<h4>На  товар - <b><i> $model->model_name </i> </b>, отзывов пока нет!</h4>";
		?>


	</section>
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

</body>

</html>
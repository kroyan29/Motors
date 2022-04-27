<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Добро пожаловать</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="img/log.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="styleMenu.css" />
	<style>
		body {
			background-color: teal;
		}

		.conteinerqq {
			width: 100%;
			display: flex;
			flex-flow: row wrap;
			text-align: center;
			font: 1.2em sans-serif;
			justify-content: space-around;
		}

		.kart_img {
			width: 97%;
			height: 300px;
		}

		.kard {
			background-color: burlywood;
			flex: 1 1 40rem;
			padding: 2px 2px 2px 2px;
			margin: 0.5rem;
			box-shadow: 0.3rem 0.4rem 0.4rem rgba(0, 0, 0, 0.4);
			overflow: hidden;
		}

		.pdescr {
			font-size: 20px;
			margin: 5px 5px 5px 5px;
			text-align: justify;
		}
	</style>
</head>

<body>
	<?php require_once 'index_user.php'; ?>

	<div class="wrapper">
		<div class="container">

			<div class="col-lg-12">
				<center>
					<h2>
						<?php
						session_start();
						require_once 'config/connectionvars.php';



						if (!isset($_SESSION['user_login']))	//проверьте, неавторизованный пользователь не имеет доступа в "welcome.php " страница
						{
							header("location: index.php");
						}

						$id = $_SESSION['user_login'];

						$select_stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
						$select_stmt->execute(array(":uid" => $id));

						$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

						if (isset($_SESSION['user_login'])) {
						?>

						<?php
							echo $row['username'];
							$_SESSION["menuUser"] = 'true';
						}
						if ($row['rol'] == "admin")
							echo '<a href="admin.php"> =>  АДМИНИСТРИРОВАНИЕ</a>';
						?>
					</h2>
				</center>

			</div>

		</div>
	</div>
	<hr>

	<div class='conteinerqq'>
		<?php
		$select_stmt = $pdo->prepare("SELECT * FROM slider");
		$select_stmt->execute();
		while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {

		?>

			<div class="kard">
				<h2> <?php echo $row['title']; ?>
					<hr>
				</h2>
				<p><img class="kart_img" src=<?php echo $row['adress']; ?> </p>
				<p class="pdescr"> <?php echo $row['discription']; ?> </p>
			</div>

		<?php
		}
		?>
	</div>
</body>

</html>
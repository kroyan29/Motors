<?php

require_once "config/connectionvars.php";

if (isset($_REQUEST['btn_register'])) //название кнопки  "btn_register", если нажата
{
	$username	= strip_tags($_REQUEST['txt_username']);	//textbox name "txt_email"
	$email		= strip_tags($_REQUEST['txt_email']);		//textbox name "txt_email"
	$password	= strip_tags($_REQUEST['txt_password']);	//textbox name "txt_password"

	if (empty($username)) {
		$errorMsg[] = "Пожалуйста, введите имя пользователя";	//проверьте, чтобы текстовое поле имени пользователя не было пустым 
	} else if (empty($email)) {
		$errorMsg[] = "Пожалуйста, введите email";	//проверьте, чтобы текстовое поле email не было пустым
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errorMsg[] = "Пожалуйста, введите действительный адрес электронной почты";	//проверьте правильный формат электронной почты
	} else if (empty($password)) {
		$errorMsg[] = "Пожалуйста, введите password";	//проверьте, чтобы текстовое поле passowrd не было пустым
	} else if (strlen($password) < 6) {
		$errorMsg[] = "Пароль должен состоять не менее чем из 6 символов";	//проверка пароля должна состоять из 6 символов
	} else {
		try {
			$select_stmt = $pdo->prepare("SELECT username, email FROM tbl_user 
										WHERE username=:uname OR email=:uemail"); // sql select query

			$select_stmt->execute(array(':uname' => $username, ':uemail' => $email)); //execute query 
			$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

			if ($row["username"] == $username) {
				$errorMsg[] = "Извините, имя пользователя уже существует";	//проверьте условие имя пользователя уже существует 
			} else if ($row["email"] == $email) {
				$errorMsg[] = "Извините, email уже существует";	//проверьте условие электронная почта уже существует 
			} else if (!isset($errorMsg)) //проверьте, не отображается ли "$ErrorMsg", затем продолжайте
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT); //зашифруйте пароль с помощью password_hash()

				$insert_stmt = $pdo->prepare("INSERT INTO tbl_user	(username,email,password) VALUES
																(:uname,:uemail,:upassword)"); 		//sql insert query					

				if ($insert_stmt->execute(array(
					':uname'	=> $username,
					':uemail'	=> $email,
					':upassword' => $new_password
				))) {

					$registerMsg = "Зарегистрируйтесь Успешно..... Пожалуйста, Нажмите На Ссылку Для Входа В Учетную Запись"; //execute query success message
				}
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Motors - Регистрация</title>
	<link rel="shortcut icon" href="img/log.png" type="image/png">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/animsition.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">



	<style>
		body {
			background-image: url(img/adult-gf0866f828_1920.jpg);
			width: 100%;
			height: 100%;
		}

		.container{
			top: 200px;
		}
	</style>
</head>

<body class="animsition">
	<?php require_once 'register.php'; ?>

	<div class="wrapper">

		<div class="container">

			<div class="col-lg-12">

				<?php
				if (isset($errorMsg)) {
					foreach ($errorMsg as $error) {
				?>
						<div class="alert alert-danger">
							<strong>WRONG ! <?php echo $error; ?></strong>
						</div>
					<?php
					}
				}
				if (isset($registerMsg)) {
					?>
					<div class="alert alert-success">
						<strong><?php echo $registerMsg; ?></strong>
					</div>
				<?php
				}
				?><br><br><br><br><br> <br><br><br><br><br>
				<center>
					<h2>Страница регистрации</h2>
				</center><br><br>
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label">Имя пользователя</label>
						<div class="col-sm-6">
							<input type="text" name="txt_username" class="form-control" placeholder="Введите имя" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-6">
							<input type="text" name="txt_email" class="form-control" placeholder="Введите email" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-6">
							<input type="password" name="txt_password" class="form-control" placeholder="Введите passowrd" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9 m-t-15">
							<input type="submit" name="btn_register" class="btn btn-primary " value="Регистрация">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9 m-t-15">
							У вас есть учетная запись, зарегистрированная здесь? <a href="login.php">
								<p class="text-info">Авторизоваться</p>
							</a>
						</div>
					</div>

				</form>

			</div>

		</div>

	</div>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="js/smoothScroll.js"></script>
	<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
	<script type="text/javascript" src="js/wow.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>
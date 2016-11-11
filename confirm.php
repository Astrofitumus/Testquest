<!DOCTYPE html>
<html lang="ru">
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		
		<script src="/js/jquery.js"></script><!--2.1.4-->
		<script src="/js/bootstrap.js"></script>
		<?
		session_start();
		if (empty($_SESSION['login']))
			{
			// Если пусты, то мы не выводим ссылку
			header("Location:registration.php");
			exit;
		}
		?>
		<title>Тестовое задание в компанию TOPFACE</title>
	</head>
	<body>
	
	<div class="container">
		<div id="row" class="row text-center" style="padding:5px;">
			<h2>Отлично, вы успешно зарегистрировались в <span style="color:#36D2F9">Testproject INC</span>!<br>
			Ваш e-mail: <?php echo $_SESSION['login']; ?> <br>
			Не теряйте времени и скорей выходите из системы!</h2>
			<div class="col-xs-4 col-xs-offset-4 ">
				<form role="form" action="logout.php">
					<button type="submit" class="btn btn-default">Выйти</button>
				</form>
			</div>
			
		</div>
			
	</div>
	</body>
</html>
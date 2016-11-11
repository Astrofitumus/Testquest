<!DOCTYPE html>
<html lang="ru">
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		<script src="/js/jquery.js"></script><!--2.1.4-->
		<script src="/js/bootstrap.js"></script>
		<title>Тестовое задание в компанию TOPFACE</title>
	</head>
	<body>
		<div class="container">
			<div id="row" class="row" style="padding:5px;">
				<div class="col-xs-8 col-xs-offset-2 text-center">
					<?php
						 session_start();
						 //Уничтожаем переменную сессии и саму сессию
						 unset($_SESSION['login']); 
						 session_destroy();
						 echo "<h2>Вы успешно вышли из системы.<br><a href='registration.php'>Вернуться на страницу регистрации</a>"
					?>
				</div>
			</div>
		</div>
	</body>
</html>
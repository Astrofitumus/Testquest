<!DOCTYPE html>
<html lang="ru">
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		
		<script src="/js/jquery.js"></script><!--2.1.4-->
		<script src="/js/bootstrap.js"></script>
		<script src="/js/tabs.js"></script> <!--Скрипт, реализующий Bootstrap-вкладки-->
		<?
			session_start();
			if (!empty($_SESSION['login']))
				{
				// Если пусты, то мы не выводим ссылку
				header("Location:index.php");
				exit;
			}
		?>
		<title>Тестовое задание в компанию TOPFACE</title>
	</head>
	<body>

		<div class="container">
			<div id="row" class="row" style="padding:5px;">
				<!--Список вкладок-->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#login-tab" data-toggle="tab">Войти</a></li>
					<li><a href="#registration-tab" data-toggle="tab">Зарегистрироваться</a></li>
				</ul>
				<!--Список вкладок-->
				
				<!--Содержимое вкладок-->
				<div class="tab-content">
					<!--Вкладка авторизации-->
					<div class="tab-pane active" id="login-tab">
						<div class="row text-center">
							<div class="col-xs-4 col-xs-offset-4">
								<br>
								<h2>Пожалуйста, авторизуйтесь:</h2>
								<br>
								<form role="form" method="POST" action="login.php">
									<div class="form-group">
										<label for="InputEmail1">Email</label>
										<input name="login" type="email" class="form-control" id="InputEmail" placeholder="Введите email">
									</div>
									<div class="form-group">
										<label for="InputPassword">Пароль</label>
										<input name="password" type="password" class="form-control" id="InputPassword" placeholder="Введите пароль">
									</div>
									<button type="submit" class="btn btn-default">Отправить</button>
								</form>
							</div>
						</div>
					</div>
					
					<!--Вкладка авторизации-->
					<div class="tab-pane" id="registration-tab">
						<div class="row text-center">
							<div class="col-xs-4 col-xs-offset-4">
								<br>
								<h2>Зарегистрируйтесь в <span style="color:#36D2F9">Testproject INC</span>:</h2><br>
								<h5><span style="color:red">*</span> отмечены поля, обязательные для заполнения</h5>
								<br>
								<form role="form" method="POST" action="register.php">
									<div class="form-group">
										<label for="InputName" class="necessary">Ваше имя</label>
										<input required type="text" class="form-control" id="InputName" name="Name" placeholder="Введите имя">
									</div>
									<div class="form-group">
										<label for="InputSurame" class="necessary">Ваша фамилия</label>
										<input required type="text" class="form-control" id="InputSurame" name="SurName" placeholder="Введите фамилию">
									</div>
									<div class="form-group">
										<label for="InputThirdname" class="optional">Ваше отчество</label>
										<input type="text" class="form-control" id="InputThirdname" name="ThirdName" placeholder="Введите отчество">
									</div>
									<div class="form-group">
										<label for="InputCountry" class="optional">Страна проживания</label>
										<input type="text" class="form-control" id="InputCountry" name="Country" placeholder="Введите страну">
									</div>
									<div class="form-group">
										<label for="InputNewEmail" class="necessary">Email</label>
										<input required type="email" class="form-control" id="email" name="email" placeholder="Enter email"><span id="msgbox" style="display:none"></span>
									</div>
									<div class="form-group">
										<label for="InputPassword" class="necessary">Пароль</label>
										<input required type="password" class="form-control" id="InputPassword" name="Password" placeholder="Password">
									</div>
									<button type="submit" id="submit" class="btn btn-default">Отправить</button>
								</form>
							</div>
						</div>
					</div>
					<!--Вкладка авторизации-->
				</div>
				<!--Содержимое вкладок-->
			</div>
		</div>
		<!--Скрипт проверки e-mail на незанятость-->
		<script>
		$(document).ready(function(){
			$("#email").blur(function(){
				
				$("#msgbox").removeClass().addClass('messagebox').text('Проверка...').fadeIn("slow");
				//Проверяем, существует ли имя
				$.post("available.php",{ email:$(this).val() } ,function(data)
				{
				if(data=='1') //Если email занят
				{
				$("#msgbox").fadeTo(200,0.1,function() //Выводим сообщение
				{ 
				$(this).html('Этот email уже занят').addClass('messageboxerror').fadeTo(900,1);
				document.getElementById('submit').disabled = true;

				}); 
				}
				else if(data=='2') //Если email не задан
				{
				$("#msgbox").fadeTo(200,0.1,function() //Выводим сообщение
				{ 
				$(this).html('Вы не ввели email').addClass('messageboxerror').fadeTo(900,1);
				document.getElementById('submit').disabled = true;

				}); 
				}
				else
				{
				$("#msgbox").fadeTo(200,0.1,function() 
				{ 
				//Выводим сообщение о доступности
				$(this).html('Email свободен!').addClass('messageboxok').fadeTo(900,1);
				document.getElementById('submit').disabled = false;		
				});
				}
				});
			
			});
		});
		</script>
		<!--Скрипт проверки e-mail на незанятость-->
	</body>
</html>
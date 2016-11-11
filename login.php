<?php
    session_start();
	if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } // Заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } // Заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
	if (empty($login) or empty($password)){ // Если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
			exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
		}
    // Если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	// Удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
	// Подключаемся к базе
    require_once 'connect.php';

	// Выбираем БД
	mysqli_select_db($link, "u846848583_blog") or die(mysql_error());
 
	$result = mysqli_query($link, "SELECT * FROM user_table WHERE email='$login'"); // Извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password'])){
		//Если пользователя с введенным логином не существует
		exit ("Извините, введённый вами login или пароль неверный.");
		}
    else {
		//Если существует, то сверяем пароли
		if (password_verify($password,$myrow['password'])) {
			//Если пароли совпадают, то запускаем пользователю сессию
			$_SESSION['login']=$myrow['email']; 
			$_SESSION['id']=$myrow['id'];
			header("Location:index.php");
		}
	else {
		//Если пароли не сошлись

		exit ("Извините, введённый вами login или пароль неверный.");
	}
    }
?>
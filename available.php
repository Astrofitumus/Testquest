<?php
	//Подключаемся к БД
	require_once 'connect.php';

	// Выбираем БД, с которой будем работать
	mysqli_select_db($link, "u846848583_blog") or die(mysql_error());

	//Заправшиваем всех существующих пользователей в базе
	$result = mysqli_query($link, "SELECT email FROM user_table");

	//Создаем массив уже существующих пользователей
	$existing_users=array();
	while ($row = mysqli_fetch_row($result)) {

	array_push($existing_users, $row[0]);
	} 
	//Получаем значение email из формы и приводим его к нижнему регистру
	$email=$_POST['email'];
	$email = mb_strtolower($email, 'UTF-8');
	
	//проверка существует ли пользователь в массиве $existing_users
	if (in_array($email, $existing_users)){
			//юзер недоступен, так как существует
			echo "1";
		} 
		else if ($email == '') {
			//Если не введен email
			echo "2";
		}
		else {
			//доступен
			echo "3";
		}

?>
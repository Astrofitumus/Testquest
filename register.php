<?php
	// Соединиться с сервером БД
	require_once 'connect.php';

	// Выбрать БД
	mysqli_select_db($link, "u846848583_blog") or die(mysql_error());
	
				
	//Здесь я должен был заносить ip пользователя в базу, чтобы потом использовать его для блокировки регистрации на заданное время, однако я не смог это реализовать, 
	//уперевшись в извлечение данных из БД и нежелание PHP возвращать мне тип данных date.
	/*$ipquery = "INSERT INTO ip_table (`DATE`, `IP`) VALUES ('$regtime', '$ip')";
	$resultip = mysqli_query($link, $ipquery); */
	
	$Name= $_POST['Name'];
	$SurName= $_POST['SurName'];
	$ThirdName= $_POST['ThirdName'];
	$Country= $_POST['Country'];
	$Email= $_POST['email'];
	$Password= $_POST['Password'];
	$HashedPass= password_hash($Password, PASSWORD_DEFAULT);
	//Приводим email к нижнему регистру
	$Email = mb_strtolower($Email, 'UTF-8');
	
	$query = "INSERT INTO user_table (`Name`, `Surname`, `Thirdname`, `Country`, `email`, `password`) VALUES ('$Name', '$SurName', '$ThirdName', '$Country', '$Email', '$HashedPass')";
	$result = mysqli_query($link, $query); // Заносим информацию по новому пользователю в БД

	session_start();
	$_SESSION['login']=$Email; 
	header("Location:confirm.php");
	?>
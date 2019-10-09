<?php
// Подключение к базе данных
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = $_POST['login']; 
	$password = $_POST['password']; 

	if (preg_match("/[0-9]/", $password) && strlen($password) <= 5 )
	{
	if (  !$connection  )  die( "Error" );
	 
	$query = "INSERT INTO Пароли (login, password) VALUE ('$login', '$password')";

if (  mysqli_query($connection, $query)  ){ echo "Вы успешно зарегистрированы.";
	header("refresh:3; login.html");
}
else echo "Пользователь не добавлен: " . mysqli_error($connection);
}
	else {
		echo "Пароль должен состоять из цифр состоять от 1 до 5 символов";
		header("refresh:3; register.html");
	}
}
mysqli_close($connection);

?>

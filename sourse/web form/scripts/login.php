<?php
// Подключение к базе данных
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$login = $_POST['login']; 
	$password = $_POST['password']; 
	
	if (  !$connection  )  die( "Error" );
	if (strlen($password)>0){
	$query = "SELECT password FROM Пароли WHERE login ='$login'";
	$result  =  mysqli_query( $connection,  $query );
	//echo mysqli_fetch_row($result)[0];
	
	//echo $password;

	if (sprintf("%s", mysqli_fetch_row($result)[0]) === sprintf("%s",$password)){
		header("Location: welcome.php?login=$login"); }
	else{
		echo "Неверный логин или пароль";
		header("refresh:2; login.html");
	}
	if ( !$result ) echo "Произошла ошибка: "  .  mysqli_error($connection);

}
else {
		echo "Введите пароль";
		header("refresh:3; login.html");
	}
}


mysqli_close($connection);

?>

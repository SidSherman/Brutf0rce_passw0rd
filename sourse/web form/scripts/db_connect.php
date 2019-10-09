<?php
// Подключение файла с информацией о базе данных
include("db_host.php");

// Подключение к базе данных
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

mysqli_set_charset($connection, "utf8"); // Указание кодировки соединения
if (mysqli_connect_errno()) {
echo("<p>Невозможно подключиться к базе данных: <br />". mysqli_connect_error()."</p>");
exit();
}
?>
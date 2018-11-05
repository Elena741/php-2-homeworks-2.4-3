<?php
if (empty($_POST['login']) || empty($_POST['password'])) {
	header("Location:loginFormCheckIn.php");
	exit;
} 
	$pdo = new PDO("mysql:host=localhost; dbname=global","root","");

	$login = $_POST['login'];
	$password = $_POST['password'];

	$sth = $pdo->prepare("SELECT id from user WHERE login='$login'");
    $sth->execute();
    $sth = $sth->fetchAll(PDO::FETCH_ASSOC);
 
    if (!empty($sth)) {
    	echo "Такой логин уже существует";
    	require("loginFormCheckIn.php");
    	exit;
    }

	$sth = $pdo->prepare("INSERT INTO user (login, password) VALUES ('$login', '$password')");
    $sth->execute();
    echo "Регистрация прошла успешно";

?>

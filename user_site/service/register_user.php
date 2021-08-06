<?php

require 'database.php';

session_start();

$name = trim($_POST["name"]);
$last_name = trim($_POST["last_name"]);
$email = addslashes(trim($_POST["email"]));
$password = md5(trim($_POST["password"]));

$sql = "INSERT INTO PEV_USER (NAME, LAST_NAME, EMAIL, PASSWORD) VALUES ('$name', '$last_name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
	$_SESSION["user_id"] = $data["ID"];
	$_SESSION["user_name"] = stripslashes($data["NAME"]);
	$_SESSION["user_last_name"] = stripslashes($data["LAST_NAME"]);
	$_SESSION["register_response"] = "SUCCESS";
	header("Location: /user_site/index.php");
} else {
	$_SESSION["register_response"] = "Já existe usuário com esse email";
    header("Location: /user_site/views/login.php");
}

mysqli_close($conn);

<?php

include 'database.php';

$sql = "INSERT INTO PEV_USER (NAME, LAST_NAME, EMAIL, PASSWORD) VALUES ('".$_POST['name']."', '".$_POST['lastName']."', '".$_POST['email']."', '".$_POST['password']."')";

if (mysqli_query($conn, $sql)) {
	echo json_encode(array("statusCode" => 200));
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

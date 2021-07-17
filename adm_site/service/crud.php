<?php

	include 'database.php';

	session_start();

	if(count($_POST)>0){

		if($_POST['type']==1){
			$name=$_POST['name'];
			$lastname=$_POST['lastname'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$password=md5("buscapev");
			$sql = "INSERT INTO PEV_MODERATOR(NAME, LAST_NAME, EMAIL, PHONE, PASSWORD) 
			VALUES ('$name', '$lastname', '$email', '$phone', '$password')";
			if (mysqli_query($conn, $sql)) {
				$message = "Inserção realizada com sucesso";
        		header("Location: ../index.php?message=$message");
			} 
			else {
				$message = "Ocorreu um problema! ".mysqli_error($conn);
        		header("Location: ../index.php?message=$message");
			}
			mysqli_close($conn);
		}

		if($_POST['type']==2){
			$id=$_POST['id'];
			$name=$_POST['name'];
			$lastname=$_POST['lastname'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$sql = "UPDATE PEV_MODERATOR SET NAME='$name', LAST_NAME='$lastname', EMAIL='$email', PHONE='$phone' WHERE ID=$id";
			if (mysqli_query($conn, $sql)) {
				$message = "Atualização realizada com sucesso";
        		header("Location: ../index.php?message=$message");
			} 
			else {
				$message = "Ocorreu um problema! ".mysqli_error($conn);
        		header("Location: ../index.php?message=$message");
			}
			mysqli_close($conn);
		}

		if($_POST['type']==3){
			$id=$_POST['id'];
			$sql = "DELETE FROM PEV_MODERATOR WHERE ID=$id ";
			if (mysqli_query($conn, $sql)) {
				$message = "Exclusão realizada com sucesso";
        		header("Location: ../index.php?message=$message");
			} 
			else {
				$message = "Ocorreu um problema! ".mysqli_error($conn);
        		header("Location: ../index.php?message=$message");
			}
			mysqli_close($conn);
		}

		if($_POST['type']==4){
			$id=$_POST['id'];
			$sql = "DELETE FROM PEV_MODERATOR WHERE ID in ($id)";
			if (mysqli_query($conn, $sql)) {
				echo $id;
			} 
			else {
				$message = "Ocorreu um problema! ".mysqli_error($conn);
        		header("Location: ../index.php?message=$message");
			}
			mysqli_close($conn);
		}
	}
?>
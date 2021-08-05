<?php

	include 'database.php';

	session_start();

	if(count($_POST)>0){

		if($_POST['type']==1){
			$cep=$_POST['cep'];
			$street=$_POST['street'];
			$district=$_POST['district'];
			$number=$_POST['number'];
			$sql = "INSERT INTO PEV(cep, street, district, number) 
			VALUES ('$cep', '$street', '$district', '$number')";
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
			$cep=$_POST['cep'];
			$street=$_POST['street'];
			$district=$_POST['district'];
			$number=$_POST['number'];
			$sql = "UPDATE PEV SET cep='$cep', street='$street', district='$district', number='$number' WHERE ID=$id";
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
			$sql = "DELETE FROM PEV WHERE ID=$id ";
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
			$sql = "DELETE FROM PEV WHERE ID in ($id)";
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
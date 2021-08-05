<?php

    require "database.php";

    session_start();

    $current = md5(trim($_POST["current_password"]));
    $new = md5(trim($_POST["new_password"]));

    $result = mysqli_query($conn, "SELECT * FROM PEV_MODERATOR WHERE ID = '".$_SESSION["user_id"]."' AND PASSWORD = '$current'");

    if(mysqli_num_rows($result)) {

        $sql = "UPDATE PEV_MODERATOR SET PASSWORD='$new' WHERE ID=".$_SESSION["user_id"]."";
        if (mysqli_query($conn, $sql)) {
            $message = "Troca de senha realizada com sucesso";
            header("Location: ../index.php?message=$message");
        } else {
            $_SESSION["change_password_response"]= "Houve um erro na hora de trocar a senha!";
            header("Location: ../change_password.php");
        }
    } else {
        $_SESSION["change_password_response"]= "A senha atual digitada é inválida!";
        header("Location: ../change_password.php");
    }

    mysqli_close($conn);

?>
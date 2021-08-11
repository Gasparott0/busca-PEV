<?php

    require "database.php";

    session_start();

    $email = addslashes(trim($_POST["email"]));
    $password = md5(trim($_POST["password"]));

    $result = mysqli_query($conn, "SELECT * FROM PEV_USER WHERE EMAIL = '$email'");


    if(mysqli_num_rows($result)) {

        $data = mysqli_fetch_array($result);

        if(!strcmp($password, $data["PASSWORD"])) {
            $_SESSION["user_id"]= $data["ID"];
            $_SESSION["user_name"] = stripslashes($data["NAME"]);
            $_SESSION["login_response"]= "SUCCESS";
            header("Location: ../index.php");
        } else {
            $_SESSION["login_response"]= "Usuário ou senha inválida!";
            header("Location: ../views/login.php");
        }
    } else {
        $_SESSION["login_response"]= "Usuário ou senha inválida!";
        header("Location: ../views/login.php");
    }

    mysqli_close($conn);

?>
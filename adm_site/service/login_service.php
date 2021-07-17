<?php

    require "database.php";

    session_start();

    $user_name = addslashes(trim($_POST["user_name"]));
    $password = md5(trim($_POST["password"]));

    $result = mysqli_query($conn, "SELECT * FROM PEV_ADMIN WHERE USER_NAME = '" . $user_name . "'");


    if(mysqli_num_rows($result)) {

        $data = mysqli_fetch_array($result);

        if(!strcmp($password, $data["PASSWORD"])) {
            $_SESSION["user_id"]= $data["ID"];
            $_SESSION["user_name"] = stripslashes($data["USER_NAME"]);
            header("Location: ../index.php");
        } else {
            $_SESSION["login_response"]= "A senha digitada é inválida!";
            header("Location: ../login.php");
        }
    } else {
        $_SESSION["login_response"]= "A usuário digitado é inválido!";
        header("Location: ../login.php");
    }

    mysqli_close($conn);

?>
<?php

    require "database.php";

    session_start();

    $user_name = isset($_POST["user_name"]) ? addslashes(trim($_POST["user_name"])) : FALSE;
    $password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE;

    if(!$user_name || !$password)
    {
        echo "Você deve digitar sua password e user_name!";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM PEV_ADMIN WHERE USER_NAME = '" . $user_name . "'");


    if(mysqli_num_rows($result)) {

        $data = mysqli_fetch_array($result);

        if(!strcmp($password, $data["PASSWORD"])) {
            $_SESSION["user_id"]= $data["ID"];
            $_SESSION["user_name"] = stripslashes($data["USER_NAME"]);
            header("Location: ../index.php");
        }
    }

    mysqli_close($conn);

?>
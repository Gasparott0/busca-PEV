<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="css/login.css">

    <title>ADM</title>

</head>

<body>

    <h1>BUSCAPEV - Administração</h1>

    <form action="service/login_service.php" method="POST">

        <input type="text" id="user_name" name="user_name" placeholder="Administrador" required />

        <input type="password" id="password" name="password" placeholder="Senha" required />

        <input type="submit" id="submit" value="Entrar">

    </form>

    <?php

        session_start();

        if(isset($_SESSION["login_response"])) {
            echo "<p>".$_SESSION["login_response"]."</p";
        }

    ?>

</body>

</html>
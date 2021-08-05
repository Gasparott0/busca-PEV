<?php

require 'service/check_login.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="css/login.css">

    <title>Moderador</title>

</head>

<body>

    <h1>ALTERAR SENHA</h1>

    <form action="service/change_password_service.php" method="POST">

        <input type="password" id="current_password" name="current_password" placeholder="Senha Atual" required />

        <input type="password" id="new_password" name="new_password" placeholder="Nova Senha" required />

        <input type="submit" id="submit" value="Alterar senha">

    </form>

    <?php

        if(isset($_SESSION["change_password_response"])) {
            echo "<p>".$_SESSION["change_password_response"]."</p";
        }

    ?>

</body>

</html>
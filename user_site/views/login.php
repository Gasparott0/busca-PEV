<!DOCTYPE html>
<html lang="pt_br">

<head>

    <?php include 'partials/head_commons.php'; ?>

    <link rel="stylesheet" href="/user_site/public/styles/login.css">
    <link rel="stylesheet" href="/user_site/public/styles/modal.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/user_site/public/scripts/ajax.js"></script>

</head>

<body>

    <div id="page-login">

        <?php include 'partials/header.php'; ?>

        <div class="forms">

            <form action="../service/register_user.php" method="POST">
                <h1>Cadastro</h1>
                <fieldset>
                    <div class="field-group">
                        <div class="field">
                            <label for="name">Nome:</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="field">
                            <label for="lastName">Sobrenome:</label>
                            <input type="text" name="last_name" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="field">
                            <label for="password">Senha:</label>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                    <?php

                        if(isset($_SESSION["register_response"])) {
                            echo '<p>'.$_SESSION["register_response"].'</p>';
                            unset($_SESSION['register_response']);
                        }

                    ?>
                </fieldset>
                <input type="submit" class="submit" value="Cadastrar">
            </form>

            <form action="../service/login_user.php" method="POST">
                <h1>Login</h1>
                <fieldset>
                    <div class="field-group">
                        <div class="field">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div class="field_group">
                        <div class="field">
                            <label for="password">Senha:</label>
                            <input type="password" name="password" required>
                        </div>
                    </div>
                    <?php

                        if(isset($_SESSION["login_response"])) {
                            echo '<p>'.$_SESSION["login_response"].'</p>';
                            unset($_SESSION['login_response']);
                        }

                    ?>
                </fieldset>
                <input type="submit" class="submit" value="Entrar">
            </form>
        </div>

    </div>
    
</body>

</html>
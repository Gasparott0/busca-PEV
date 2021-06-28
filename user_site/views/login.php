<!DOCTYPE html>
<html lang="pt_br">

<head>

    <?php include 'partials/head_commons.php'; ?>

    <link rel="stylesheet" href="/user_site/public/styles/login.css">

</head>

<body>

    <div id="page-login">

        <?php include 'partials/header.php'; ?>

        <div class="forms">

            <form action="#" method="POST">
                <h1>Cadastro</h1>
                <fieldset>
                    <div class="field-group">
                        <div class="field">
                            <label for="name">Nome:</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="field">
                            <label for="lastName">Sobrenome:</label>
                            <input type="text" name="lastName" required>
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
                </fieldset>
                <button type="submit">Cadastrar</button>
            </form>

            <form action="#" method="POST">
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
                </fieldset>
                <button type="submit">Entrar</button>
            </form>
        </div>

    </div>

</body>

</html>
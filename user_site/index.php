<!DOCTYPE html>
<html lang="pt_br">

<head>

    <?php include 'views/partials/head_commons.php'; ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/user_site/public/styles/home.css">
    <link rel="stylesheet" href="/user_site/public/styles/modal.css">

</head>

<body>

    <div id="page-home">

        <div class="content">

            <header>
                
                
                <?php
                    
                    include 'views/partials/logo.php';

                    if(isset($_SESSION["user_name"])) {                        
                        echo "<a href=\"/user_site/service/exit.php\">
                                    <span class=\"logout\">
                                    </span>
                                    Sair
                                </a>";
                    } else {
                        echo    "<a href=\"/user_site/views/login.php\">
                                    <span class=\"login\">
                                    </span>
                                    Entrar
                                </a>";
                    }

                ?>
                

            </header>

            <main>
                <h1>PEV</h1>
                <p>Pontos de Entrega Voluntária de entulho e outros materiais recicláveis</p>
                <a href="/user_site/views/pevs.php"><span></span><strong>Ver PEVs</strong></a>
            </main>

        </div>

    </div>

      
    <?php

        if(isset($_SESSION["register_response"]) && $_SESSION["register_response"] == "SUCCESS") {
            include 'views/partials/user_created.php';
            unset($_SESSION['register_response']);
            exit;
        }

    ?>

</body>

</html>
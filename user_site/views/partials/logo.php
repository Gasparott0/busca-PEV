<div class="logo">

        <img src="/user_site/public/assets/logo.svg" alt="Logomarca">

        <?php

            session_start();

            if(isset($_SESSION["user_name"]))                       
                echo "<p>| Bem vindo, " . $_SESSION["user_name"] . "</p>";

        ?>

</div>
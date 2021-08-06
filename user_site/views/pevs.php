<!DOCTYPE html>
<html lang="pt_br">

<?php
require "database.php";
session_start();
$query = "SELECT CEP, STREET, DISTRICT FROM PEV";
$resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<head>

    <?php include 'partials/head_commons.php'; ?>

    <link rel="stylesheet" href="/user_site/public/styles/page-pevs.css">

</head>

<body>

    <div id="page-pevs">

        <?php include 'partials/header.php'; ?>

        <main>

            <?php
            echo "<h4><strong>" . mysqli_num_rows($resultado) . " PEV(s)</strong> encontrado(s)</h4>";
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<div class=cards>";

                    echo "<div class=card>";

                    echo "<img src=https://www.google.com.br/maps/place/" . $row["STREET"] . "alt=Teste>";

                    echo "<h1>" . $row["DISTRICT"] . "</h1>";

                    echo "<h3>" . $row["STREET"] . ", " . $row["CEP"] . "</h3>";

                    echo "</div>";

                    echo "</div>";
                }
            }
            ?>

        </main>

    </div>

</body>

</html>
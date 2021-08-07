<!DOCTYPE html>
<html lang="pt_br">

<?php
require "../service/database.php";
session_start();
$query = "SELECT * FROM PEV";
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
            if (mysqli_num_rows($resultado) > 0) {
                echo "<h4><strong>" . mysqli_num_rows($resultado) . " PEV(s)</strong> encontrado(s)</h4>";
                echo "<div class=cards>";
                while ($row = mysqli_fetch_assoc($resultado)) {

                    echo "<div class=card>";

                    $str = str_replace(' ', '+', $row["STREET"]);
                    echo "<img src=https://maps.googleapis.com/maps/api/staticmap?center=" . $str . "," . $row["NUMBER"] . "&zoom=17&size=600x400&key=Xcwcc7ITQ_IhWM3E-aqX25Zn65Q= alt=Teste>";

                    echo "<h1>" . $row["DISTRICT"] . "</h1>";

                    echo "<h3>" . $row["STREET"] . "</h3>";

                    echo "<p>Número: " . $row["NUMBER"] . ", CEP: " . $row["CEP"] . "</p>";

                    echo "</div>";
                }
                echo "</div>";
            }
            ?>

        </main>

    </div>

</body>

</html>
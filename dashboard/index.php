<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
    }

?>

<html>

    <body>

        <header>
            <?php include("../partials/head.php"); ?>
        </header>

        <?php include("../partials/header.php"); ?>

    </body>

</html>
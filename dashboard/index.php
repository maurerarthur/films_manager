<?php

    session_start();

    if($_SESSION["usuario"]) {
        echo "Index do dashboard";
    } else {
        header("Location: ../index.php");
    }

?>
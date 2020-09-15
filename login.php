<?php

    session_start();

    $host = "localhost";
    $db = "films_sys";
    $db_user = "root";
    $db_password = "root";

    $con = new PDO("mysql:host=$host;dbname=$db", $db_user, $db_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(is_null($con)) {

        echo "Erro na conexão";

    } else {

        try {

            $stmt = $con->prepare("SELECT email, senha FROM users WHERE email = :email");
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->execute();

            while($usuario = $stmt->fetch()) {
                if($usuario["email"] == $_POST["email"] && password_verify($_POST["senha"], $usuario["senha"])) {
                    $_SESSION["usuario"] = $usuario["email"];
                }
            }

        } catch(PDOException $e) {
            $erro = $e->getMessage();
            echo "Erro: $erro";
        }

    }

?>
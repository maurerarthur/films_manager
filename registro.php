<?php

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

            $stmt = $con->prepare("INSERT INTO users (email, senha) VALUES (:email, :senha)");
            $stmt->execute(array(
                ":email" => $_POST["email"],
                ":senha" => password_hash($_POST["senha"], PASSWORD_BCRYPT, array(
                    "cost" => 10
                ))
            ));

            header("Location: /index.php");

        } catch(PDOException $e) {
            $erro = $e->getMessage();
            echo "Erro: $erro";
        }

    }

?>
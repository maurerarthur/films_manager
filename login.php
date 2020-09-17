<?php

    session_start();

    if(isset($_SESSION["usuario"])) {
        header("Location: ./filmes");
    }

    require_once("./src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $stmt = $con->prepare("SELECT email, senha FROM users WHERE email = :email");
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();

        $usuario = $stmt->fetch();

        if($usuario && $usuario["email"] == $_POST["email"] && password_verify($_POST["senha"], $usuario["senha"])) {
            $_SESSION["usuario"] = $usuario["email"];
            header("Location: ./filmes");
            exit(0);
        } else {
            header("Location: /index.php?erro=true");
        }

    } catch(PDOException $e) {
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }

?>
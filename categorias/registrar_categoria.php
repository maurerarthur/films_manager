<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
    }

    require_once("../src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $stmt = $con->prepare("INSERT INTO categorias (categoria) VALUES (:categoria)");
        $stmt->execute(array(
            ":categoria" => $_POST["categoria"]
        ));

        header("Location: /dashboard");

    } catch(PDOException $e) {
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }

?>
<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
    }

    require_once("../src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $stmt = $con->prepare("INSERT INTO filmes (nome, categoria) VALUES (:nome, :categoria)");
        $stmt->execute(array(
            ":nome" => $_POST["filme"],
            ":categoria" => $_POST["categoria"]
        ));

        header("Location: /filmes");

    } catch(PDOException $e) {
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }

?>
<?php

    require_once("./src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $stmt = $con->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();

        $usuario = $stmt->fetch();

        if($usuario["email"] == $_POST["email"]) {

            header("Location: /criar_conta.php?erro=true");
            exit(0);

        } else {

            $stmt = $con->prepare("INSERT INTO users (email, senha) VALUES (:email, :senha)");
            $stmt->execute(array(
                ":email" => $_POST["email"],
                ":senha" => password_hash($_POST["senha"], PASSWORD_BCRYPT, array(
                    "cost" => 10
                ))
            ));

            header("Location: /index.php");

        }

    } catch(PDOException $e) {
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }

?>
<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
    }

    require_once("../src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        if(isset($_GET["id"])) {

            $stmt = $con->prepare("SELECT * FROM filmes WHERE categoria = :id");
            $stmt->bindParam(":id", $_GET["id"]);
            $stmt->execute();
    
            $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } else {

            $stmt = $con->prepare("SELECT * FROM filmes");
            $stmt->execute();
    
            $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        $stmt = $con->prepare("SELECT * FROM categorias");
        $stmt->execute();

        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }

?>

<html>

    <header>
        <?php include("../partials/head.php"); ?>
    </header>

    <?php include("../partials/header.php"); ?>

    <body>

        <div class="container">

            <h4 class="mt-5">Filtros:</h4>

            <div>
                <a href="/filmes" class="btn btn-primary">Todas</a>
                <?php foreach($categorias as $categoria) : ?>
                    <a href="/filmes?id=<?php echo $categoria["id"]; ?>" class="btn btn-primary"><?php echo $categoria["categoria"]; ?></a>
                <?php endforeach; ?>
            </div>

            <a href="/filmes/new.php" class="btn btn-primary w-100 mt-5">Cadastrar novo filme/série</a>

            <?php if(empty($filmes)) : ?>

                <div class="alert alert-primary d-flex align-items-center justify-content-center w-100 mt-2" role="alert">Nenhum filme/série cadastrado</div>
            
            <?php else : ?>

                <table class="table table-striped mt-5">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($filmes as $filme) : ?>
                            <tr>
                                <td><?php echo $filme["id"]; ?></td>
                                <td><?php echo $filme["nome"]; ?></td>
                                <td>
                                    <a href="/filmes/edit.php?id=<?php echo $filme["id"]; ?>&nome=<?php echo $filme["nome"]; ?>" type="button" class="btn btn-warning">Editar</a>
                                    <a href="/filmes/delete.php?id=<?php echo $filme["id"]; ?>" type="button" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

        </div>

    </body>

</html>
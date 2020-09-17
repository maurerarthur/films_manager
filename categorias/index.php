<?php

    require_once("../src/utils/ConnectionFactory.php");

    $con = ConnectionFactory::getConnection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $stmt = $con->prepare("SELECT * FROM categorias");
        $stmt->execute();

        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        $erro = $e->getMessage();
        echo "Erro: $erro";
    }

?>

<html>

    <body>

        <header>
            <?php include("../partials/head.php"); ?>
        </header>

        <?php include("../partials/header.php"); ?>

        <div class="container">

            <a href="/categorias/new.php" class="btn btn-primary w-100 mt-5">Cadastrar nova categoria</a>

            <?php if(empty($categorias)) : ?>

                <div class="alert alert-primary d-flex align-items-center justify-content-center w-100 mt-2" role="alert">Nenhuma categoria cadastrada</div>
            
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
                        <?php foreach($categorias as $categoria) : ?>
                            <tr>
                                <td><?php echo $categoria["id"]; ?></td>
                                <td><?php echo $categoria["categoria"]; ?></td>
                                <td>
                                    <a href="/categorias/edit.php?id=<?php echo $categoria["id"]; ?>&categoria=<?php echo $categoria["categoria"]; ?>" type="button" class="btn btn-warning">Editar</a>
                                    <a href="/categorias/delete.php?id=<?php echo $categoria["id"]; ?>" type="button" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

        </div>

    </body>

</html>
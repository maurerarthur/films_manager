<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
        exit(0);
    }

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

    <header>
        <?php include("../partials/head.php"); ?>
    </header>

    <body>

        <?php include("../partials/header.php"); ?>

        <div class="container h-100">

            <div class="row h-100 d-flex flex-column align-items-center justify-content-center">

                <h2 class="mb-5">Cadastrar novo filme/série</h2>

                <form class="col-6" method="POST" action="/filmes/registrar_filme.php">

                    <div class="form-group">
                        <label>Nome do filme/série</label>
                        <input type="text" name="filme" class="form-control" placeholder="Filme">
                        <select name="categoria" class="form-control mt-2">
                            <?php foreach($categorias as $categoria) : ?>
                                <option value="<?php echo $categoria["id"]; ?>"><?php echo $categoria["categoria"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Cadastrar</button>

                </form>

            </div>

        </div>

    </body>

</html>
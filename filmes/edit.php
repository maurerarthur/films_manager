<?php

    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
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

                <h2 class="mb-5">Atualizar Filme/Série</h2>

                <form class="col-6" method="POST" action="/filmes/atualizar_filme.php">

                    <div class="form-group">
                        <label>Nome do filme/série</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $_GET["nome"]; ?>">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Atualizar</button>

                </form>

            </div>

        </div>

    </body>

</html>
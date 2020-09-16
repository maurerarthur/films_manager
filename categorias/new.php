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

                <h2 class="mb-5">Cadastrar nova categoria</h2>

                <form class="col-6" method="POST" action="/categorias/registrar_categoria.php">

                    <div class="form-group">
                        <label>Nome da categoria</label>
                        <input type="text" name="categoria" class="form-control" placeholder="Categoria">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Cadastrar</button>

                </form>

            </div>

        </div>

    </body>

</html>
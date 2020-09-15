<?php

    $host = "localhost";
    $db = "films_sys";
    $db_user = "root";
    $db_password = "root";

    $con = new PDO("mysql:host=$host;db_name=$db", $db_user, $db_password);

    if(is_null($con)) { 
        #echo "Não conectou";
    } else {
        #echo "Conectado";
    }

?>

<html>

    <header>
        <?php include("./partials/head.php"); ?>
    </header>

    <body>

        <div class="container h-100">

            <div class="row h-100 d-flex flex-column align-items-center justify-content-center">

                <h2 class="mb-5">Films Manager</h2>

                <form class="col-6">

                    <div class="form-group">
                        <label>Endereço de e-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" placeholder="Senha">
                    </div>

                    <a type="submit" class="btn btn-primary w-100 mb-3">Login</a>
                    <a href="/criar_conta.php" type="submit" class="btn btn-primary w-100">Criar Conta</a>

                </form>

            </div>

        </div>

    </body>

</html>
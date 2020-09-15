<html>

    <header>
        <?php include("./partials/head.php"); ?>
    </header>

    <body>

        <div class="container h-100">

            <div class="row h-100 d-flex flex-column align-items-center justify-content-center">

                <h2 class="mb-5">Criação de Conta</h2>

                <form class="col-6" method="POST" action="registro.php">

                    <div class="form-group">
                        <label>Endereço de e-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Criar Conta</button>

                </form>

            </div>

        </div>

    </body>

</html>
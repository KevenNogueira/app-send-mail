<?php if (!isset($_GET['status'])) {
    header('Location: Index.php');
} ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <!-- Fontewesom -->
    <script src="https://kit.fontawesome.com/7d3a8355c9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS/style.css" />

    <title>App Mail Send</title>
</head>

<body>
    <div class="container">
        <div class="py-3 text-center border-bottom border-dark">
            <img class="d-block mx-auto mb-2" src="./IMG/logo.png" alt="Logo App Mail Send" width="72" height="72">
            <h2>Send Mail</h2>
            <p class="lead">Seu app de envio de e-mails particular!</p>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <?php if ($_GET['status'] == 'sucesso') { ?>
                    <div class="container">
                        <h1 class="display-4 text-success">Sucesso!!</h1>
                        <p>Envio de e-mail com sucesso!!</p>
                        <a href="Index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                    </div>
                <?php } ?>

                <?php if ($_GET['status'] == 'erro') { ?>
                    <div class="container">
                        <h1 class="display-4 text-danger">Ops!!</h1>
                        <p>Falha ao fazer o envio do e-mail! Favor tentar novamente mais tarde.</p>
                        <a href="Index.php" class="btn btn-danger btn-lg mt-5 text-white">Voltar</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
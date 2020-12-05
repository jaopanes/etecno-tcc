<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="<?= url("views/assets/img/apple-icon.png"); ?>">
    <link rel="icon" type="image/png" href="<?= url("views/assets/img/favicon.png"); ?>">

    <title>Login | <?= SITE ?></title>

    <?php include __DIR__ . '/assets/components/styles.php'; ?>
    <style>
        .flex {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .flex .container-fluid {
            max-width: 550px;
        }
    </style>
</head>

<body>
    <div class="flex">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header text-center">
                                <p class="card-text">
                                    <div class="author">
                                        <a href="javascript:void(0)">
                                            <img class="avatar" src="<?= url("views/assets/img/logo.png"); ?>" alt="logo">
                                        </a>
                                    </div>
                                </p>
                                <h4 class="card-title">E-Tecno</h4>
                                <p class="card-category">Informe seus dados para realizar login</p>
                            </div>

                            <br>

                            <form method="POST" action="<?= $router->route("auth.login") ?>">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required name="l_email">

                                        <label for="inputPassword4">Senha</label>
                                        <input type="password" class="form-control" id="inputPassword4" placeholder="***" required name="l_pass">
                                    </div>

                                </div>

                                <button style="width: 100%;" type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <?php include __DIR__ . '/assets/components/theme_def_void.php'; ?>
    <?php include __DIR__ . '/assets/components/scripts.php'; ?>
    <?php include __DIR__ . '/assets/components/theme_script.php'; ?>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="<?= url("views/js/main.js"); ?>"></script>
</body>

</html>
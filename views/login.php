<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

* Documentation: https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html
-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= url("views/assets/img/apple-icon.png"); ?>">
    <link rel="icon" type="image/png" href="<?= url("views/assets/img/favicon.png"); ?>">
    <title>Login | <?= SITE ?></title>
    <!--Styles-->
    <?php include __DIR__ . '/assets/components/styles.php'; ?>
    <!--End Styles-->
</head>

<body class="">
    <!--Side bar-->

    <!--End Side bar-->

    <!--Main-->
    <div class="">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute  navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#">E-Tecno</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-link"><a href="#">
                                <button class="btn btn-primary btn-simple btn-round">
                                    <i class="tim-icons icon-support-17"></i> Suporte
                                </button>
                            </a></li>

                        <li class="nav-link"><a href="#">
                                <button class="btn btn-primary btn-simple btn-round">
                                    <i class="tim-icons icon-app"></i> Sobre
                                </button>
                            </a></li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!--Content-->
        <div class="content">
            <div class="container-fluid">
                <br />
                <br />
                <br />
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
                                <br />

                                <form method="POST" action="<?= $router->route("auth.login") ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required name="l_email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Senha</label>
                                            <input type="password" class="form-control" id="inputPassword4" placeholder="***" required name="l_pass">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                Mantenha-me conectado
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>

                                <a href="#">Esqueci minha senha</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Content-->

        <!--Footer-->
        <?php include __DIR__ . '/assets/components/footer.php'; ?>
        <!--End Footer-->

    </div>
    <!--End Main-->

    <!--Theme_def-->
    <?php include __DIR__ . '/assets/components/theme_def_void.php'; ?>
    <!--End Theme_def-->

    <!--Scripts-->
    <?php include __DIR__ . '/assets/components/scripts.php'; ?>
    <!--End Scripts-->


    <!--Theme_script-->
    <?php include __DIR__ . '/assets/components/theme_script.php'; ?>
    <!--End Theme_script-->

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?= url("views/js/main.js"); ?>"></script>
</body>

</html>
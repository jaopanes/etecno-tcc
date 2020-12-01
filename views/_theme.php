<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= url("views/assets/img/apple-icon.png"); ?>">
    <link rel="icon" type="image/png" href="<?= url("views/assets/img/favicon.png"); ?>">
    <title><?= $title; ?> | <?= SITE ?></title>

    <!--Styles-->
    <?php include __DIR__ . '/assets/components/styles.php'; ?>
    <!--End Styles-->
</head>

<body class="">
    <div class="wrapper">

        <?php if ($access >= 3) :  ?>
            <!--Side bar-->
            <?php include __DIR__ . '/assets/components/sidebar.php'; ?>
            <!--End Side bar-->
        <?php endif; ?>

        <!--Main-->
        <div class="main-panel">

            <!-- Navbar -->
            <?php include __DIR__ . '/assets/components/navbar.php'; ?>
            <!-- End Navbar -->

            <!--Content-->
            <div class="content">
                <?= $v->section("content"); ?>
            </div>
            <!--End Content-->

            <!--Footer-->
            <?php include __DIR__ . '/assets/components/footer.php'; ?>
            <!--End Footer-->
        </div>
        <!--End Main-->
    </div>

    <!--Theme_def-->
    <?php include __DIR__ . '/assets/components/theme_def.php'; ?>
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
    <script src="<?= url("views/js/main.js"); ?>"></script>
    <?= $v->section("scripts"); ?>
</body>

</html>
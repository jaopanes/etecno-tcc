<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="<?= url("views/assets/img/apple-icon.png"); ?>">
    <link rel="icon" type="image/png" href="<?= url("views/assets/img/favicon.png"); ?>">
    
    <?php include __DIR__ . '/assets/components/styles.php'; ?>

    <title><?= $title; ?> | <?= SITE ?></title>
</head>

<body class="">
    <div class="wrapper">

        <?php if ($access >= 3) :  ?>
            <?php include __DIR__ . '/assets/components/sidebar.php'; ?>
        <?php endif; ?>

        <div class="main-panel">
            <?php include __DIR__ . '/assets/components/navbar.php'; ?>
           
            <div class="content">
                <?= $v->section("content"); ?>
            </div>
          
            <?php include __DIR__ . '/assets/components/footer.php'; ?>
        </div>
    </div>

    <?php include __DIR__ . '/assets/components/theme_def.php'; ?>
    <?php include __DIR__ . '/assets/components/scripts.php'; ?>
    <?php include __DIR__ . '/assets/components/theme_script.php'; ?>

    <script>
        $(document).ready(function() {
           
            demo.initDashboardPageCharts();

        });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="<?= url("views/js/main.js"); ?>"></script>
    <?= $v->section("scripts"); ?>
</body>

</html>
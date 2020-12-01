<!doctype html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Erro | <?= $error ?></title>

    <link rel="stylesheet" type="text/css" href="<?= url("views/css/styles.css"); ?>">
</head>

<body>
    <main id="login" style="flex-direction: column">
        <h2>Erro <?= $error; ?></h2>
        <p>Consulte o suporte para verificar o erro.</p>
    </main>
</body>

</html>
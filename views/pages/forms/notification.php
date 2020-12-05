<?php $v->layout("_theme", ["title" => "Cadastro de notificação"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.tag"); ?>">Notificações</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Cadastro de notificação</h3>
            
            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="notification-register" method="POST" name="notification_register" action="<?= $router->route("api.notification_add"); ?>">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        Digite o conteúdo da notificação
                        <input type="text" class="form-control" placeholder="Conteúdo" name="n_content" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar notificação</button>
            </form>
        </div>
    </div>

</main>
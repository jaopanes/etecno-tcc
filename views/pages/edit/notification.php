<?php $v->layout("_theme", ["title" => "Editar notificação"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.notification"); ?>">Notificação</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Editar notificação</h3>

            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="notification-edit" method="POST" name="notification_edit" action="<?= $router->route("api.notification_edit", ["nid" => $id]); ?>">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputZip">ID</label>
                        <input name="n_id" type="hidden" class="form-control" id="inputZip" value="<?= $notification->id ?>">
                        <input type="text" readonly class="form-control" id="inputZip" value="<?= $notification->id ?>">
                    </div>

                    <div class="form-group col-md-10">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="inputAddress" name="n_content" value="<?= $notification->content ?>">
                    </div>
                </div>

                <button class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>

</main>
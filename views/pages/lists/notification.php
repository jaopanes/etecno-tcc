<?php $v->layout("_theme", ["title" => "Lista de funções"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Notificações</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12" style="display: flex; justify-content: flex-end;">
            <div class="card">
                <div class="card-body">
                    <a href="<?= $router->route("app.new_notification") ?>">
                        <button class="btn btn-primary btn-round">
                            <i class="tim-icons icon-badge"></i> Enviar nova notificação
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Listagem de Notificações</h3>
                </div>
                <div class="card-body">
                    <?php if ($notification) : ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Conteúdo</th>
                                        <th>Autor</th>
                                        <th class="text-right">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notification as $n) : ?>
                                        <tr>
                                            <td class="text-center"><?= $n->id; ?></td>
                                            <td><?= $n->content; ?></td>
                                            <?php foreach ($n->notificationUser() as $u) : ?>
                                                <td><?= $u->name ?></td>
                                            <?php endforeach; ?>
                                            <td class="td-actions text-right">
                                                <a href="<?= $router->route("app.notification_edit", ["nid" => $n->id]) ?>">
                                                    <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Não existem notificações cadastradas
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</main>
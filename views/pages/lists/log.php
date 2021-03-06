<?php $v->layout("_theme", ["title" => "Lista de logs"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Logs</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Registro de logs</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>ID do usuário</th>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th>Criada em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($log) :
                                    foreach ($log as $l) : ?>
                                        <tr>
                                            <td class="text-center"><?= $l->id; ?></td>
                                            <td class="text-center"><?= $l->user_id; ?></td>
                                            <td><?= $l->action; ?></td>
                                            <td><?= $l->description; ?></td>
                                            <td><?= dateformat($l->created_at); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Não existem logs cadastrados
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
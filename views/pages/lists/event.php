<?php $v->layout("_theme", ["title" => "Lista de eventos"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Eventos</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Listagem de eventos</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-left">RM</th>
                                <th class="text-left">Nome</th>
                                <th class="text-left">Hora</th>
                                <th class="text-left">Descrição</th>
                                <th class="text-left">Tipo</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($events->find()->fetch(true)) :
                                foreach ($events->find()->fetch(true) as $e):
                                    foreach ($e->eventUser() as $u):
                                    ?>
                                    <tr>
                                        <td class="text-left"><?= $u->id; ?></td>
                                        <td class="text-left"><?= $u->name; ?></td>
                                        <td class="text-left"><?= dateformat($e->created_at); ?></td>
                                        <td class="text-left"><?= $e->description; ?></td>
                                        <td class="text-left"><?= $e->type; ?></td>
                                        <td class="text-center">
                                            <span class="badge badge-pill <?= $e->status == "permitida" ? "badge-success" : "badge-warning" ?>"><?= $e->status; ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; endforeach; else : ?>
                                <li>
                                    <div class="std-name">Não existem usuários cadastrados</div>
                                </li>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>
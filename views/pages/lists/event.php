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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Filtro</h3>
                </div>

                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        Pesquise um evento a partir do nome de um usuário!
                    </div>

                    <form id="event-search" method="POST" name="event-search" action="<?= $router->route("api.event_search") ?>">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputEmail4">Nome</label>
                                <input name="e_search" type="text" class="form-control" id="inputEmail4" placeholder="Nome">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </form>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Listagem de eventos</h3>
                </div>
                <div class="card-body">

                    <?php if ($events->find()->fetch(true)) : ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-left">ID do evento</th>
                                        <th class="text-left">Nome</th>
                                        <th class="text-left">Hora</th>
                                        <th class="text-left">Descrição</th>
                                        <th class="text-left">Tipo</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($events->find()->fetch(true) as $e) :
                                        foreach ($e->eventUser() as $u) :
                                    ?>
                                            <tr>
                                                <td class="event-search-td text-left"><?= $e->id; ?></td>
                                                <td class="event-search-td text-left"><?= $u->name; ?></td>
                                                <td class="event-search-td text-left"><?= dateformat($e->created_at); ?></td>
                                                <td class="event-search-td text-left"><?= $e->description; ?></td>
                                                <td class="event-search-td text-left"><?= $e->type; ?></td>
                                                <td class="event-search-td text-center">
                                                    <span class="badge badge-pill <?= $e->status == "permitida" ? "badge-success" : "badge-warning" ?>"><?= $e->status; ?></span>
                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Não existem eventos cadastrados
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
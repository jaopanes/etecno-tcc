<?php $v->layout("_theme", ["title" => "Página Inicial"]); ?>

<main>
    <?php if ($access >= 2) : ?>
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: flex-end;">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= $router->route("app.event_add") ?>">
                            <button class="btn btn-primary btn-round">
                                <i class="tim-icons icon-send"></i> Fazer requisição
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($access >= 3) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body all-icons">

                        <div class="row">

                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <div class="font-icon-detail">
                                    <h2><?= $user ?></h2>
                                    <h6><?= $user == 1 ? "usuário cadastrado" : "usuários cadastrados" ?></h6>
                                </div>
                            </div>

                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <div class="font-icon-detail">
                                    <h2><?= $events->find()->count(); ?></h2>
                                    <h6><?= $events->find()->count() == 1 ? "evento requisitado" : "eventos requisitados" ?></h6>
                                </div>
                            </div>

                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <div class="font-icon-detail">
                                    <h2><?= $classroom ?></h2>
                                    <h6><?= $classroom == 1 ? "classe cadastrada" : "classes cadastradas" ?><h6>
                                </div>
                            </div>

                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                <div class="font-icon-detail">
                                    <h2><?= $student ?></h2>
                                    <h6><?= $student == 1 ? "estudante cadastrado" : "estudantes cadastrados" ?><h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($access == 1 || $access >= 3) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Requisições pendentes</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($events->find("status = 'pendente'")->fetch(true)) : ?>
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
                                            <?php if ($access >= 3) : ?>
                                                <th class="text-right">Ação</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($events->find("status = 'pendente'")->order("updated_at DESC")->fetch(true) as $evt) :
                                            foreach ($evt->eventUser() as $u) : ?>
                                                <tr>
                                                    <td class="text-left"><?= $u->id; ?></td>
                                                    <td class="text-left">
                                                        <?= $u->name; ?>
                                                    </td>
                                                    <td class="text-left"><?= dateformat($evt->created_at); ?></td>
                                                    <td class="text-left"><?= $evt->description; ?></td>
                                                    <td class="text-left"><?= $evt->type; ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill <?= $evt->status == "permitida" ? "badge-success" : "badge-warning" ?>"><?= $evt->status; ?></span>
                                                    </td>
                                                    <?php if ($access >= 3) : ?>
                                                        <td class="td-actions text-right">
                                                            <button type="button" data-type="enable" data-id="<?= $evt->id ?>" rel="tooltip" class="status-event btn btn-success btn-link btn-icon btn-sm">
                                                                <i class="tim-icons icon-check-2"></i>
                                                            </button>

                                                            <button type="button" data-type="disable" data-id="<?= $evt->id ?>" rel="tooltip" class="status-event btn btn-danger btn-link btn-icon btn-sm">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach;  ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-warning" role="alert">
                                Não existem requisições pendentes
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Log das últimas 10 requisições</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($events->find("status = 'permitida' OR status = 'negada'")->fetch(true)) : ?>
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

                                        <?php foreach ($events->find("status = 'permitida' OR status = 'negada'")->order("updated_at DESC")->limit(10)->fetch(true) as $evt) :
                                            foreach ($evt->eventUser() as $u) : ?>
                                                <tr>
                                                    <td class="text-left"><?= $u->id; ?></td>
                                                    <td class="text-left"><?= $u->name; ?></td>
                                                    <td class="text-left"><?= dateformat($evt->created_at); ?></td>
                                                    <td class="text-left"><?= $evt->description; ?></td>
                                                    <td class="text-left"><?= $evt->type; ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill <?= $evt->status == "permitida" ? "badge-success" : "badge-warning" ?>"><?= $evt->status; ?></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach;  ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-warning" role="alert">
                                Não existem log de requisições
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($access == 2) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Minha requisições</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($events->find("user_id = '{$session_id}'")->fetch(true)) : ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">ID</th>
                                            <th class="text-left">Hora</th>
                                            <th class="text-left">Descrição</th>
                                            <th class="text-left">Tipo</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($events->find("user_id = '{$session_id}'")->fetch(true) as $evt) :
                                            foreach ($evt->eventUser() as $u) : ?>
                                                <tr>
                                                    <td class="text-left"><?= $evt->id; ?></td>
                                                    <td class="text-left"><?= dateformat($evt->created_at); ?></td>
                                                    <td class="text-left"><?= $evt->description; ?></td>
                                                    <td class="text-left"><?= $evt->type; ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill <?= $evt->status == "permitida" ? "badge-success" : "badge-warning" ?>"><?= $evt->status; ?></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach;  ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-warning" role="alert">
                                Você não possuí nenhuma requisição
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

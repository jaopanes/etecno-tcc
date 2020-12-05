<?php $v->layout("_theme", ["title" => "Lista de usuários"]); ?>

<main>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuários</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12" style="display: flex; justify-content: flex-end;">
            <div class="card">
                <div class="card-body">
                    <a href="<?= $router->route("app.register") ?>">
                        <button class="btn btn-primary btn-round">
                            <i class="tim-icons icon-badge"></i> Cadastrar novo usuário
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
                    <h3 class="card-title">Listagem de usuários</h3>
                </div>
                <div class="card-body">
                    <?php if ($user->find()->fetch(true)) : ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-left">RM</th>
                                        <th class="text-left">Nome</th>
                                        <th class="text-left">Classificação</th>
                                        <th class="text-left">Nível de acesso</th>
                                        <th class="text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user->find()->fetch(true) as $u) : ?>
                                        <tr>
                                            <td class="text-left"><?= $u->id; ?></td>
                                            <td class="text-left">
                                                <?= $u->name; ?>
                                            </td>

                                            <?php foreach ($u->userTag() as $t) : ?>
                                                <td class="text-left"><?= $t->tag ?></td>
                                            <?php endforeach; ?>

                                            <?php foreach ($u->userRole() as $r) : ?>
                                                <td class="text-left"><?= $r->type ?></td>
                                            <?php endforeach; ?>

                                            <td class="td-actions text-right">
                                                <a href="<?= $router->route("app.user_read", ["uid" => $u->id]) ?>">
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
                            Não existem usuários cadastrados
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
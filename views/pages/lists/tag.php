<?php $v->layout("_theme", ["title" => "Lista de funções"]); ?>

<main>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tags</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12" style="display: flex; justify-content: flex-end;">
            <div class="card">
                <div class="card-body">
                    <a href="<?= $router->route("app.new_tag") ?>">
                        <button class="btn btn-primary btn-round">
                            <i class="tim-icons icon-badge"></i> Cadastrar nova tag
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
                    <h3 class="card-title">Listagem de Tags</h3>
                </div>
                <div class="card-body">
                    <?php if ($tag) : ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Função</th>
                                        <th>Criada em</th>
                                        <th>Atualizada em</th>
                                        <th class="text-right">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tag as $t) : ?>
                                        <tr>
                                            <td class="text-center"><?= $t->id; ?></td>
                                            <td><?= $t->tag; ?></td>
                                            <td><?= dateformat($t->created_at) ?></td>
                                            <td><?= dateformat($t->updated_at) ?></td>
                                            <td class="td-actions text-right">
                                                <a href="<?= $router->route("app.tag_edit", ["tid" => $t->id]) ?>">
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
                            Não existem tags cadastradas
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
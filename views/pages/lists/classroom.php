<?php $v->layout("_theme", ["title" => "Lista de classes"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Classes</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12" style="display: flex; justify-content: flex-end;">
            <div class="card">
                <div class="card-body">
                    <a href="<?= $router->route("app.new_classroom") ?>">
                        <button class="btn btn-primary btn-round">
                            <i class="tim-icons icon-badge"></i> Cadastrar nova classe
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
                    <h3 class="card-title">Listagem de classes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-left">ID</th>
                                    <th class="text-left">Nome</th>
                                    <th class="text-left">Ano letivo</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($classroom) :
                                    foreach ($classroom as $c) : ?>
                                        <tr>
                                            <td class="text-left"><?= $c->id; ?></td>
                                            <td class="text-left">
                                                <?= $c->name; ?>
                                            </td>

                                            <td class="text-left"><?= $c->year ?></td>

                                            <td class="td-actions text-right">
                                                <a href="<?= $router->route("app.classroom_edit", ["cid" => $c->id]) ?>">
                                                    <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </button>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                else : ?>
                                    <li>
                                        <div class="std-name">Não existem classes cadastradas</div>
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
<?php $v->layout("_theme", ["title" => "Lista de estudantes"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Estudantes</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12" style="display: flex; justify-content: flex-end;">
            <div class="card">
                <div class="card-body">
                    <a href="<?= $router->route("app.new_student") ?>">
                        <button class="btn btn-primary btn-round">
                            <i class="tim-icons icon-badge"></i> Cadastrar novo estudante
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
                    <h3 class="card-title">Listagem de estudantes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-left">RM</th>
                                    <th class="text-left">Nome</th>
                                    <th class="text-left">Classe</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($student->find()->fetch(true)) :
                                    foreach ($student->find()->fetch(true) as $s) :
                                        foreach ($s->studentUser() as $u) :
                                ?>
                                            <tr>
                                                <td class="text-left"><?= $s->id; ?></td>
                                                <td class="text-left"><?= $u->name; ?></td>
                                                <?php foreach ($s->studentClass as $c) : ?>
                                                    <td class="text-left"><?= $c->name; ?></td>
                                                <?php endforeach; ?>
                                                <td class="td-actions text-right">
                                                    <a href="<?= $router->route("app.student_edit", ["sid" => $s->id]) ?>">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm">
                                                            <i class="tim-icons icon-pencil"></i>
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    endforeach;
                                else : ?>
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
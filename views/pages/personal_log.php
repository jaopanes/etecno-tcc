<?php $v->layout("_theme", ["title" => "Meus logs"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.profile"); ?>">Perfil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Logs</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Registro de logs pessoais</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
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
                                        <td><?= $l->action; ?></td>
                                        <td><?= $l->description; ?></td>
                                        <td><?= dateformat($l->created_at); ?></td>
                                    </tr>
                                <?php endforeach;
                            else : ?>
                            </tbody>
                        </table>

                        <div class="alert alert-primary">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Perto">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                            <span><b>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"></font>Oops...
                </font>
            </b>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Ainda não existem logs.</font>
            </font>
        </span>
                        </div>
                        <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
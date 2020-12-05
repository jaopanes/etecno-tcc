<?php $v->layout("_theme", ["title" => "Editar sala"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.classroom"); ?>">Salas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Editar sala</h3>

            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="student-edit" method="POST" name="student_edit" action="<?= $router->route("api.classroom_edit", ["cid" => $id]); ?>">
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputZip">ID .nor</label>
                        <input type="hidden" class="form-control" id="inputZip" value="<?= $class->id ?>">
                        <input type="text" readonly class="form-control" id="inputZip" value="<?= $class->id ?>">
                    </div>

                    <div class="form-group col-md-11">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="inputAddress" name="c_name" value="<?= $class->name ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputAddress">Ano letivo</label>
                        <input type="text" class="form-control" id="inputAddress" name="c_year" value="<?= $class->year ?>">
                    </div>

                    <div class="form-group col-md-11">
                        <label for="inputState">Status do sala</label>
                        <select id="inputState" class="form-control" name="c_status">
                            <option value="ativo" <?= $class->status == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                            <option value="inativo" <?= $class->status == 'inativo' ? 'selected' : '' ?>>Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            Confirmar alterações
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>

</main>
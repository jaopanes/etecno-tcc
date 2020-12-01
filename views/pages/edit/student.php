<?php $v->layout("_theme", ["title" => "Editar estudante"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.students"); ?>">Estudante</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Editar estudante</h3>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estejam corretos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>

            <form id="student-edit" method="POST" name="student_edit" action="<?= $router->route("api.student_edit", ["sid" => $id]); ?>">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputZip">ID</label>
                        <input name="s_id" type="hidden" class="form-control" id="inputZip" value="<?= $student->id ?>">
                        <input type="text" readonly class="form-control" id="inputZip" value="<?= $student->id ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Classe</label>

                        <select name="s_class" id="inputState" class="form-control">
                            <?php foreach ($class as $c): ?>
                                <option value="<?= $c->id ?>" <?= $c->id == $student->class_id ? "selected" : "" ?>><?= $c->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress">Status</label>

                        <select name="s_status" id="inputState" class="form-control">
                            <option value="ativo" <?= $student->status == 'ativo' ? "selected" : "" ?>>Ativo</option>
                            <option value="inativo" <?= $student->status == 'inativo' ? "selected" : "" ?>>Inativo</option>
                        </select>
                    </div>
                </div>


                <button class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>

</main>
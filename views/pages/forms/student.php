<?php $v->layout("_theme", ["title" => "Cadastro"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.students"); ?>">Estudantes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Cadastrar estudante</h3>
            <form id="student-register" method="POST" name="student_register" action="<?= $router->route("api.student_add"); ?>">
                <div class="alert alert-info alert-with-icon" data-notify="container">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Perto">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span data-notify="icon" class="tim-icons icon-bell-55"></span>
                    <span data-notify="message">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Certifique-se que os dados estejam corretos.</font>
                        </font>
                    </span>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Nome</label>

                    <select name="s_id" id="inputState" class="form-control">
                        <?php foreach ($users as $u): ?>
                            <option value="<?= $u->id ?>"><?= $u->id ?> - <?= $u->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Classe</label>

                    <select name="s_class" id="inputState" class="form-control">
                        <?php foreach ($class as $c): ?>
                            <option value="<?= $c->id ?>"><?= $c->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

</main>
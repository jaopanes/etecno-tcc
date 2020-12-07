<?php $v->layout("_theme", ["title" => "Cadastro de tags"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.tag"); ?>">Tags</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Cadastro de função</h3>

            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="student-register" method="POST" name="student_register" action="<?= $router->route("api.new_tag"); ?>">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        Digite o nome da tag:
                        <input type="text" class="form-control" placeholder="Tag" name="t_name" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar tag</button>
            </form>
        </div>
    </div>
</main>
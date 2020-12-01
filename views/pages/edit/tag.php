<?php $v->layout("_theme", ["title" => "Editar tag"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.users"); ?>">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Editar tag</h3>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estejam corretos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>

            <form id="student-edit" method="POST" name="student_edit" action="<?= $router->route("api.tag_edit", ["tid" => $id]); ?>">
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputZip">ID</label>
                        <input name="t_id" type="hidden" class="form-control" id="inputZip" value="<?= $tag->id ?>">
                        <input type="text" readonly class="form-control" id="inputZip" value="<?= $tag->id ?>">
                    </div>

                    <div class="form-group col-md-11">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="inputAddress" name="t_tag" value="<?= $tag->tag ?>">
                    </div>
                </div>
                <button class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>

</main>
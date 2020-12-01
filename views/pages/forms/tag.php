<?php $v->layout("_theme", ["title" => "Cadastro"]); ?>

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
            <form id="student-register" method="tag" name="student_register" action="<?= $router->route("api.new_tag"); ?>">

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
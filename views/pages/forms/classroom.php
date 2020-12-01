<?php $v->layout("_theme", ["title" => "Cadastro"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $router->route("app.classroom"); ?>">Classes</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Cadastro de classe</h3>
            <form id="student-register" method="tag" name="student_register" action="<?= $router->route("api.classroom_add"); ?>">

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
                    <div class="form-group col-md-12">
                        Digite o nome da classe:
                        <input type="text" class="form-control" placeholder="Nome" name="c_name" required>
                    </div>

                    <div class="form-group col-md-12">
                        Digite o ano letivo:
                        <input type="text" class="form-control" placeholder="Ano" name="c_year" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar classe</button>
            </form>
        </div>
    </div>

</main>
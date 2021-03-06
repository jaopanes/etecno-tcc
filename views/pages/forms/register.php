<?php $v->layout("_theme", ["title" => "Cadastro de usuário"]); ?>

<main>

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $router->route("app.home"); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $router->route("app.users"); ?>">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Cadastrar usuário</h3>

            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="student-register" method="POST" name="student_register" action="<?= $router->route("api.user_add"); ?>">
                <div class="form-group">
                    <label for="inputAddress">Nome</label>
                    <input name="u_name" type="text" class="form-control" id="inputAddress" placeholder="Nome">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input name="u_email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Senha</label>
                        <input name="u_pass" type="text" class="form-control" readonly id="inputPassword4" value="<?= $passwd ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputState">Tag</label>
                        <select name="u_tag" id="inputState" class="form-control">
                            <?php foreach ($tags as $t) : ?>
                                <option value="<?= $t->tag ?>"><?= $t->tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <?php if ($access >= 4) : ?>
                        <div class="form-group col-md-6">
                            <label for="inputState">Nível de acesso</label>
                            <select name="u_role" id="inputState" class="form-control">
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r->type ?>"><?= $r->type ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

</main>
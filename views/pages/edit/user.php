<?php $v->layout("_theme", ["title" => "Editar usuário"]); ?>

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
            <h3 class="card-title">Editar usuário</h3>

            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="student-edit" method="POST" name="student_edit" action="<?= $router->route("api.user_edit", ["uid" => $id]); ?>">
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputZip">RM</label>
                        <input type="hidden" class="form-control" id="inputZip" value="<?= $user->id ?>">
                        <input type="text" readonly class="form-control" id="inputZip" value="<?= $user->id ?>">
                    </div>

                    <div class="form-group col-md-11">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="inputAddress" name="u_name" value="<?= $user->name ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="u_email" value="<?= $user->email ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="inputState">Tag</label>
                        <select name="u_tag" id="inputState" class="form-control">
                            <?php foreach ($tags as $t) : ?>
                                <option value="<?= $t->id ?>"><?= $t->tag ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputState">Status do usuário</label>
                        <select id="inputState" class="form-control" name="u_status">
                            <option value="ativo" <?= $user->status == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                            <option value="inativo" <?= $user->status == 'inativo' ? 'selected' : '' ?>>Inativo</option>
                        </select>
                    </div>

                    <?php if ($access >= 4) : ?>
                        <div class="form-group col-md-12">
                            <label for="inputState">Nível de acesso</label>
                            <select name="u_role" id="inputState" class="form-control">
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $r->type ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
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
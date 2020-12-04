<?php $v->layout("_theme", ["title" => "Meu perfil"]); ?>

<?php foreach ($user as $u): ?>
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="javascript:void(0)">
                                <img class="avatar" src="<?= $u->avatar ?>>" alt="...">
                                <h5 class="title"><?= $u->name ?></h5>
                            </a>
                            <?php foreach ($u->userTag() as $t): ?>
                            <p class="description"><?= $t->tag ?></p>
                            <?php endforeach; ?>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Meu perfil</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= $router->route("api.personal_edit") ?>">

                        <div class="row">
                            <div class="col-md-2 pr-md-1">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="u_id" class="form-control" readonly value="<?= $u->id ?>">
                                </div>
                            </div>

                            <div class="col-md-10 pl-md-1">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="u_name" class="form-control" readonly value="<?= $u->name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" name="u_email" class="form-control" readonly value="<?= $u->email ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input type="password" name="u_pass" class="form-control" placeholder="Digite uma senha caso queira mudar">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-fill btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
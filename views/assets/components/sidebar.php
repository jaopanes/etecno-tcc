<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                >
            </a>
            <a href="<?= $router->route("app.home"); ?>" class="simple-text logo-normal">
                E-Tecno
            </a>
        </div>
        <ul class="nav">
            <li class="">
                <a title="" href="<?= $router->route("app.users"); ?>">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Usuários</p>
                </a>
            </li>
            <li class="">
                <a title="" href="<?= $router->route("app.students"); ?>">
                    <i class="tim-icons icon-attach-87"></i>
                    <p>Estudantes</p>
                </a>
            </li>

            <li class="">
                <a title="" href="<?= $router->route("app.events"); ?>">
                    <i class="tim-icons icon-zoom-split"></i>
                    <p>Eventos</p>
                </a>
            </li>

            <?php if ($access >= 4) :  ?>
                <li class="">
                    <a title="" href="<?= $router->route("app.log"); ?>">
                        <i class="tim-icons icon-vector"></i>
                        <p>Logs</p>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($access >= 4) :  ?>
                <li class="">
                    <a title="" href="<?= $router->route("app.notification"); ?>">
                        <i class="tim-icons icon-simple-add"></i>
                        <p>Notificações</p>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($access >= 4) :  ?>
                <li class="">
                    <a href="<?= $router->route("app.tag"); ?>">
                        <i class="tim-icons icon-align-center"></i>
                        <p>Tags</p>
                    </a>
                </li>
            <?php endif; ?>

            <li class="">
                <a href="<?= $router->route("app.classroom"); ?>">
                    <i class="tim-icons icon-world"></i>
                    <p>Salas</p>
                </a>
            </li>
        </ul>
    </div>
</div>
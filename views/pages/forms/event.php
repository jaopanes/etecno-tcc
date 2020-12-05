<?php $v->layout("_theme", ["title" => "Abrir pedido"]); ?>

<main>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Abertura de pedido</h3>

            <div class="alert alert-warning" role="alert">
                <strong>Atenção!</strong> Certifique-se que os dados estão corretos.
            </div>

            <form id="student-register" method="POST" name="student_register" action="<?= $router->route("api.event_add"); ?>">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        Selecione o tipo:
                        <label for="inputState"></label>
                        <select id="inputState" class="form-control" name="e_type" required>
                            <option value="entrada" selected>Entrada</option>
                            <option value="saida">Saída</option>
                        </select>
                    </div>

                    <div class="form-group col-md-8">
                        Justifique o motivo:
                        <input type="text" class="form-control" placeholder="Motivo" name="e_desc" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

</main>
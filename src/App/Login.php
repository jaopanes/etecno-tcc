<?php

namespace Source\App;

use Source\Model\User;

/**
 * Class Login
 * @package Source\Main
 */
class Login extends Controller
{
    /**
     * Login constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     *
     */
    public function render(): void
    {
        if (empty($_SESSION["user"])) {
            echo $this->view->render("login", []);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * @param array $data
     */
    public function auth(array $data): void
    {
        $u_email = filter_var($data['l_email'], FILTER_VALIDATE_EMAIL);
        $u_pass = filter_var($data['l_pass'], FILTER_DEFAULT);

        if (!$u_email || !$u_pass) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Informe seu e-mail e senha para logar."
            ]);

            return;
        }

        $user = (new User())->find("email = :e AND status = :s", "e={$u_email}&s=ativo")->fetch();
        if (!$user || !password_verify($u_pass, $user->passwd)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "E-mail ou senha incorretos ou usuário inativo."
            ]);

            return;
        }

        $_SESSION['user'] = $user->id;

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("app.home")
        ]);

        $this->log(["description" => "O usuário {$user->name} entrou no sistema", "action" => "Entrada", "id" => $user->id]);
    }
}

<?php

namespace Source\App;

use Source\Model\Classroom;
use Source\Model\Event;
use Source\Model\Notification;
use Source\Model\Student;
use Source\Model\Tag;
use Source\Model\User;
use Source\Model\Role;
use CoffeeCode\DataLayer\Connect;

/**
 * Class Api
 * @package Source\Main
 */
class Api extends Controller
{
    /**
     * Api constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     * @param array $data
     */
    public function addUser(array $data): void
    {
        /**
         * Checks for HTML injection
         */
        $userData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if (in_array("", $userData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $tag = (new Tag())->find("tag = :t", "t={$userData['u_tag']}")->fetch();

        $tagId = null;

        if ($tag) {
            $tagId = $tag->id;
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira um apelido válido!"
            ]);

            return;
        }

        $role = (new Role())->find("type = :t", "t={$userData['u_role']}")->fetch();

        $roleId = null;

        if ($role) {
            $roleId = $role->id;
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira uma permissão válida!"
            ]);

            return;
        }

        /**
         * User class instance
         */
        $user = new User();

        $user->name = $userData['u_name'];
        $user->email = $userData['u_email'];
        $user->passwd = $userData['u_pass'];
        $user->tag_id = $tagId;
        $user->access_id = $roleId;

        if (!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $user->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.users")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} adicionou um novo usuário de ID {$user->id}", "action" => "Adicionar"]);
        }
    }

    /**
     * @param array $data
     */
    public function newTag(array $data): void
    {
        $tagData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $tagData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        /**
         * Tag class instance
         */
        $tag = new Tag();

        $tag->tag = $tagData['t_name'];

        if (!$tag->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $tag->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.tag")
            ]);
        }

        $this->log(["description" => "O usuário {$this->session_info->name} adicionou uma nova tag", "action" => "Adicionar"]);
    }

    /**
     * @param array $data
     */
    public function tagEdit(array $data): void
    {
        $tagData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $tagData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        if ($tagData['tid'] != $tagData['t_id']) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Dados incongruentes!"
            ]);

            return;
        }

        $tag = (new Tag())->findById($tagData['tid']);
        $tag->tag = $tagData['t_tag'];

        if (!$tag->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $tag->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.tag")
            ]);
        }

        $this->log(["description" => "O usuário {$this->session_info->name} editou a tag {$tagData['t_id']}", "action" => "Edição"]);
    }

    /**
     * @param array $data
     */
    public function userEdit(array $data): void
    {
        $userData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $userData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $statusU = null;

        if ($userData['u_status'] == 'ativo') {
            $statusU = 'ativo';
        } else if ($userData['u_status'] == 'inativo') {
            $statusU = 'inativo';
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira um status válido!"
            ]);

            return;
        }

        $tag = (new Tag())->findById($userData['u_tag']);

        if (!$tag) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira uma tag válida!"
            ]);

            return;
        }

        $roleId = null;

        $role = (new Role())->findById($userData['u_role']);

        if ($role) {
            $roleId = $role->id;
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira uma permissão válida!"
            ]);

            return;
        }

        $user = (new User())->findById($userData['uid']);

        $user->name = $userData['u_name'];
        $user->email = $userData['u_email'];
        $user->tag_id = $tag->id;
        $user->access_id = $roleId;
        $user->status = $statusU;

        if (!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $user->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.users")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} editou o usuário {$userData['uid']}", "action" => "Edição"]);
        }
    }

    /**
     * @param array $data
     */
    public function eventAdd(array $data): void
    {
        $eventData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $eventData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $typeE = null;

        if ($eventData['e_type'] == 'entrada') {
            $typeE = 'entrada';
        } else if ($eventData['e_type'] == 'saida') {
            $typeE = 'saida';
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira um status válido!"
            ]);

            return;
        }

        $event = new Event();

        $event->type = $typeE;
        $event->description = $eventData['e_desc'];
        $event->user_id = $this->session_info->id;

        if (!$event->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $event->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.home")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} requisitou uma {$typeE}", "action" => "Requisição"]);
        }
    }

    /**
     * @param array $data
     */
    public function eventStatus(array $data): void
    {
        $infoEvent = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $event = (new Event())->findById($infoEvent['idEvent']);

        if ($infoEvent['type'] == 'enable') {
            $event->status = 'permitida';
            $event->save();

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => 'Evento permitido com sucesso!'
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} autorizou o evento {$infoEvent['idEvent']}", "action" => "Permissão"]);
        } else if ($infoEvent['type'] == 'disable') {
            $event->status = 'negada';
            $event->save();

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => 'Evento negado com sucesso!'
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} negou o evento {$infoEvent['idEvent']}", "action" => "Permissão"]);
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => 'Função não reconhecida pelo sistema.'
            ]);
        }
    }

    /**
     * @param array $data
     */
    public function classroomAdd(array $data): void
    {
        $classroomData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $classroomData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $classroom = new Classroom();

        $classroom->name = $classroomData['c_name'];
        $classroom->year = $classroomData['c_year'];

        if (!$classroom->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $classroom->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.classroom")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} adicionou uma nova classe {$classroom->id}", "action" => "Adição"]);
        }
    }

    public function classroomEdit(array $data): void
    {
        $classroomData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $classroomData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $statusC = null;

        if ($classroomData['c_status'] == 'ativo') {
            $statusC = 'ativo';
        } else if ($classroomData['c_status'] == 'inativo') {
            $statusC = 'inativo';
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira um status válido!"
            ]);

            return;
        }

        $classroom = (new Classroom())->findById($classroomData['cid']);
        $classroom->name = $classroomData['c_name'];
        $classroom->year = $classroomData['c_year'];
        $classroom->status = $statusC;

        if (!$classroom->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $classroom->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.classroom")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} editou a classe {$classroomData['cid']}", "action" => "Edição"]);
        }
    }

    /**
     * @param array $data
     */
    public function studentAdd(array $data): void
    {
        $studentData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $studentData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $user = new User();
        $class = new Classroom();
        $student = new Student();

        if ($student->find("user_id = {$studentData['s_id']}")->fetch(true)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Usuário já cadastrado como estudante!"
            ]);

            return;
        }

        if (!$user->find("id = {$studentData['s_id']}")->fetch(true)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Este usuário não existe em nosso sistema!"
            ]);

            return;
        }

        if (!$class->find("id = {$studentData['s_class']}")->fetch(true)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Esta classe não existe em nosso sistema!"
            ]);

            return;
        }

        $student->user_id = $studentData['s_id'];
        $student->class_id = $studentData['s_class'];

        if (!$student->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $student->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.students")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} adicionou o usuário {$studentData['s_id']} como estudante na sala {$studentData['s_class']}", "action" => "Adição"]);
        }
    }

    public function studentEdit(array $data): void
    {
        $studentData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $studentData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $statusS = null;

        if ($studentData['s_status'] == 'ativo') {
            $statusS = 'ativo';
        } else if ($studentData['s_status'] == 'inativo') {
            $statusS = 'inativo';
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Insira um status válido!"
            ]);

            return;
        }

        $student = (new Student())->findById($studentData['sid']);
        $student->class_id = $studentData['s_class'];
        $student->status = $statusS;

        if (!$student->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $student->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.students")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} editou o estudante {$studentData['sid']}", "action" => "Edição"]);
        }
    }
    public function eventSearch(array $data): void
    {
        $searchData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $searchData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        $user = (new User())->find("name = :n", "n={$searchData['e_search']}")->fetch();

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("app.event_search", ["data" => $user->id])
        ]);
    }

    public function personalEdit(array $data): void
    {
        $userData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $user = new User();

        if($userData['u_email'] != $this->session_info->email ||
            $userData['u_name'] != $this->session_info->name ||
            $userData['u_id'] != $this->session_info->id) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Erro no sistema!"
            ]);

            return;
        }

        $user->id = $userData['u_id'];
        $user->name = $userData['u_name'];
        $user->email = $userData['u_email'];
        $user->passwd = $userData['u_pass'];

        if(!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $user->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.profile")
            ]);

            $this->log(["description" => "O usuário {$this->session_info->name} editou a própria senha", "action" => "Edição"]);
        }
    }

    public function notificationAdd(array $data): void
    {
        $notData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $notData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        /**
         * Tag class instance
         */
        $notification = new Notification();

        $notification->content = $notData['n_content'];
        $notification->user_id = $this->session_info->id;

        if (!$notification->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $notification->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.notification")
            ]);
        }

        $this->log(["description" => "O usuário {$this->session_info->name} adicionou uma nova notificação", "action" => "Adicionar"]);
    }

    public function notificationEdit(array $data): void
    {
        $notData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if (in_array("", $notData)) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Preencha todos os campos!"
            ]);

            return;
        }

        if ($notData['nid'] != $notData['n_id']) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => "Dados incongruentes!"
            ]);

            return;
        }

        $notification = (new Notification())->findById($notData['nid']);
        $notification->content = $notData['n_content'];

        if (!$notification->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "danger",
                "message" => $notification->fail()->getMessage()
            ]);
        } else {
            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.notification")
            ]);
        }

        $this->log(["description" => "O usuário {$this->session_info->name} editou a notificação {$notData['n_id']}", "action" => "Edição"]);
    }

    public function chartJs()
    {
        $connect = Connect::getInstance();
        $data = $connect->query("SELECT MONTH(event.created_at) AS 'mes', COUNT(MONTH(event.created_at)) AS 'qtd' FROM event GROUP BY MONTH(event.created_at)");

        $months = array("", "JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET", "OUT", "NOV", "DEZ");

        $response = array(
            array("" => 0),
            array("JAN" => 0),
            array("FEV" => 0),
            array("MAR" => 0),
            array("ABR" => 0),
            array("MAI" => 0),
            array("JUN" => 0),
            array("JUL" => 0),
            array("AGO" => 0),
            array("SET" => 0),
            array("OUT" => 0),
            array("NOV" => 0),
            array("DEZ" => 0),
        );

        foreach ($data->fetchAll() as $d) {
        }

        var_dump($response[1]['JAN']);
    }
}

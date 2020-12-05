<?php

namespace Source\App;

use Source\Model\Classroom;
use Source\Model\Event;
use Source\Model\Log;
use Source\Model\Notification;
use Source\Model\Tag;
use Source\Model\Student;
use Source\Model\User;
use Source\Model\Role;

/**
 * Class Main
 * @package Source\Main
 */
class Main extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * Main constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if (empty($_SESSION['user']) || !$this->user = (new User())->findById($_SESSION['user'])) {
            unset($_SESSION['user']);

            $this->router->redirect("web.login");
        }
    }

    /**
     * Logoff
     */
    public function logoff(): void
    {
        unset($_SESSION['user']);
        $this->router->redirect("web.login");
    }

    /**
     * Home page
     */
    public function home(): void
    {
        $user = (new User())->find()->count();
        $classroom = (new Classroom())->find()->count();
        $student = (new Student())->find()->count();
        $event = new Event();

        echo $this->view->render("pages/home", [
            "user" => $user,
            "events" => $event,
            "classroom" => $classroom,
            "student" => $student,
            "session_id" => $this->session_info->id
        ]);
    }

    /**
     * User register
     */
    public function register(): void
    {
        if ($this->session_info->access_id >= 3) {
            $tags = (new Tag())->find()->fetch(true);
            $role = (new Role())->find()->fetch(true);

            $passwd = $this->generatePasswd(7);

            echo $this->view->render("pages/forms/register", [
                "tags" => $tags,
                "role" => $role,
                "session_info" => $this->session_info->access_id,
                "passwd" => $passwd
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * User list
     */
    public function userList(): void
    {
        if ($this->session_info->access_id >= 3) {
            $user = new User();

            echo $this->view->render("pages/lists/user", [
                "user" => $user
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * User read
     * @param array $data
     */
    public function userRead(array $data): void
    {
        $readData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);


        if ($this->session_info->access_id >= 3) {
            $user = (new User())->findById($readData['uid']);
            $tags = (new Tag())->find()->fetch(true);
            $role = (new Role())->find()->fetch(true);

            if ($user) {
                echo $this->view->render(
                    "pages/edit/user",
                    [
                        "id" => $readData['uid'],
                        "user" => $user,
                        "tags" => $tags,
                        "role" => $role,
                        "session_info" => $this->session_info->access_id
                    ]
                );
            } else {
                $this->router->redirect("error", ["errcode" => "404"]);
            }
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Tag
     */
    public function tag(): void
    {
        if ($this->session_info->access_id >= 4) {
            $tag = (new Tag())->find()->fetch(true);

            echo $this->view->render("pages/lists/tag", [
                "tag" => $tag
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * New Tag
     */
    public function newTag(): void
    {
        if ($this->session_info->access_id >= 4) {
            echo $this->view->render("pages/forms/tag", []);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Tag edit
     * @param array $data
     */
    public function tagEdit(array $data): void
    {
        $tagData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if ($this->session_info->access_id >= 4) {
            $tag = (new Tag())->findById($tagData['tid']);

            if ($tag) {
                echo $this->view->render(
                    "pages/edit/tag",
                    [
                        "id" => $tagData['tid'],
                        "tag" => $tag,
                    ]
                );
            } else {
                $this->router->redirect("error", ["errcode" => "404"]);
            }
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Event add
     */
    public function eventAdd(): void
    {
        if ($this->session_info->access_id >= 2) {
            echo $this->view->render("pages/forms/event", []);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Log
     */
    public function logApp(): void
    {
        if ($this->session_info->access_id >= 4) {
            $log = (new Log())->find()->order("id DESC")->fetch(true);

            echo $this->view->render("pages/lists/log", [
                "log" => $log
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Classroom
     */
    public function classroom(): void
    {
        if ($this->session_info->access_id >= 3) {
            $classroom = (new Classroom())->find()->fetch(true);

            echo $this->view->render("pages/lists/classroom", [
                "classroom" => $classroom
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * new Classroom
     */
    public function classroomAdd(): void
    {
        if ($this->session_info->access_id >= 3) {
            echo $this->view->render("pages/forms/classroom", []);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     *
     */
    public function classroomEdit(array $data): void
    {
        $classData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if ($this->session_info->access_id >= 3) {
            $classroom = (new Classroom())->findById($classData['cid']);

            echo $this->view->render("pages/edit/classroom", [
                "id" => $classData['cid'],
                "class" => $classroom
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Students
     */
    public function studentList(): void
    {
        if ($this->session_info->access_id >= 3) {
            $student = new Student();

            echo $this->view->render("pages/lists/student", [
                "student" => $student
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * new Student
     */
    public function studentAdd(): void
    {
        if ($this->session_info->access_id >= 3) {
            $users = (new User())->find()->fetch(true);
            $class = (new Classroom())->find()->fetch(true);

            echo $this->view->render("pages/forms/student", [
                "users" => $users,
                "class" => $class
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * Student edit
     * @param array $data
     */
    public function studentEdit(array $data): void
    {
        $studentData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if ($this->session_info->access_id >= 3) {
            $student = (new Student())->findById($studentData['sid']);
            $class = (new Classroom())->find()->fetch(true);

            if ($student) {
                echo $this->view->render(
                    "pages/edit/student",
                    [
                        "id" => $studentData['sid'],
                        "student" => $student,
                        "class" => $class,
                    ]
                );
            } else {
                $this->router->redirect("error", ["errcode" => "404"]);
            }
        } else {
            $this->router->redirect("app.home");
        }
    }

    public function events(): void
    {
        if($this->session_info->access_id >= 3) {
            $events = new Event();

            echo $this->view->render("pages/lists/event", [
                "events" => $events
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    public function eventSearch(array $data): void
    {
        $eventData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $event = (new Event())->find("user_id = :uid", "uid={$eventData['data']}")->order("updated_at DESC")->fetch(true);

        if($this->session_info->access_id >=3) {
            echo $this->view->render("pages/search/event", [
                "events" => $event
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    public function profile(): void
    {
        $user = (new User())->find("id = :i", "i={$this->session_info->id}")->fetch(true);

        echo $this->view->render("pages/profile", [
            "user" => $user
        ]);
    }

    public function personalLog(): void
    {
        $log = (new Log())->find("user_id = :i", ":i={$this->session_info->id}")->order("updated_at DESC")->fetch(true);

        echo $this->view->render("pages/personal_log", [
            "log" => $log
        ]);
    }

    public function notification(): void
    {
        $notification = (new Notification())->find()->order("id DESC")->fetch(true);

        if($this->session_info->access_id >=4) {
            echo $this->view->render("pages/lists/notification", [
                "notification" => $notification
            ]);
        } else {
            $this->router->redirect("app.home");
        }
    }

    public function notificationAdd(): void
    {
        if($this->session_info->access_id >=4) {
            echo $this->view->render("pages/forms/notification", []);
        } else {
            $this->router->redirect("app.home");
        }
    }

    public function notificationEdit(array $data): void
    {
        $notData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if ($this->session_info->access_id >= 4) {
            $notification = (new Notification())->findById($notData['nid']);

            if ($notification) {
                echo $this->view->render(
                    "pages/edit/notification",
                    [
                        "id" => $notData['nid'],
                        "notification" => $notification,
                    ]
                );
            } else {
                $this->router->redirect("error", ["errcode" => "404"]);
            }
        } else {
            $this->router->redirect("app.home");
        }
    }

    /**
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = filter_var($data['errcode'], FILTER_VALIDATE_INT);

        echo $this->view->render("extra/error", [
            "error" => $error
        ]);
    }
}

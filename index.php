<?php

/**
 * Router documentation https://packagist.org/packages/coffeecode/router
 */

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/**
 * Controller
 */
$router->namespace("Source\App");

/**
 * Login
 */
$router->group(null);
$router->get("/", "Login:render", "web.login");
$router->post("/login", "Login:auth", "auth.login");

/**
 * Main
 */
$router->group("app");
$router->get("/", "Main:home", "app.home");
$router->get("/sair", "Main:logoff", "app.logoff");

//User app
$router->get("/usuarios", "Main:userList", "app.users");
$router->get("/usuarios/novo", "Main:register", "app.register");
$router->get("/usuario/{uid}", "Main:userRead", "app.user_read");

//Tag app
$router->get("/tags", "Main:tag", "app.tag");
$router->get("/tags/novo", "Main:newTag", "app.new_tag");
$router->get("/tag/{tid}", "Main:tagEdit", "app.tag_edit");

//Logs app
$router->get("/logs", "Main:logApp", "app.log");

//Classroom app
$router->get("/classes", "Main:classroom", "app.classroom");
$router->get("/classes/novo", "Main:classroomAdd", "app.new_classroom");
$router->get("/classe/{cid}", "Main:classroomEdit", "app.classroom_edit");

//Student app
$router->get("/estudantes", "Main:studentList", "app.students");
$router->get("/estudantes/novo", "Main:studentAdd", "app.new_student");
$router->get("/estudante/{sid}", "Main:studentEdit", "app.student_edit");

//Event app
$router->get("/eventos", "Main:events", "app.events");
$router->get("/eventos/novo", "Main:eventAdd", "app.event_add");
$router->get("/eventos/pesquisa/usuario/{data}", "Main:eventSearch", "app.event_search");

//Profile
$router->get("/perfil", "Main:profile", "app.profile");
$router->get("/perfil/logs", "Main:personalLog", "app.personal_log");

//Notification
$router->get("/notificacoes", "Main:notification", "app.notification");
$router->get("/notificacoes/novo", "Main:notificationAdd", "app.new_notification");
$router->get("/notificacao/{nid}", "Main:notificationEdit", "app.notification_edit");

/**
 * Api
 */
$router->group("api");
//User API
$router->post("/user_add", "Api:addUser", "api.user_add");
$router->post("/user_edit/{uid}", "Api:userEdit", "api.user_edit");

//Tag API
$router->post("/new_tag", "Api:newTag", "api.new_tag");
$router->post("/tag_edit/{tid}", "Api:tagEdit", "api.tag_edit");

//Event API
$router->post("/event_add", "Api:eventAdd", "api.event_add");
$router->post("/event_status", "Api:eventStatus", "api.event_status");
$router->post("/event_search", "Api:eventSearch", "api.event_search");

//Classroom API
$router->post("/classroom_add", "Api:classroomAdd", "api.classroom_add");
$router->post("/classroom_edit/{cid}", "Api:classroomEdit", "api.classroom_edit");

//Student API
$router->post("/student_add", "Api:studentAdd", "api.student_add");
$router->post("/student_edit/{sid}", "Api:studentEdit", "api.student_edit");

//Profire API
$router->post("/personal_edit", "Api:personalEdit", "api.personal_edit");

//Notification API
$router->post("/notification_add", "Api:notificationAdd", "api.notification_add");
$router->post("/notification_edit/{nid}", "Api:notificationEdit", "api.notification_edit");

//Chartjs API
$router->get("/chartjs", "Api:chartJs", "api.chat_js");

/**
 * Error
 */
$router->group("erro");
$router->get("/{errcode}", "Main:error", "error");


/**
 * Process
 */
$router->dispatch();

if ($router->error()) {
    $router->redirect("/erro/{$router->error()}");
}

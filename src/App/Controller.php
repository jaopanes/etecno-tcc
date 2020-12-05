<?php

/**
 * Router documentation https://packagist.org/packages/coffeecode/router
 * Plates documentation https://platesphp.com/v4-alpha/
 */

namespace Source\App;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Model\Log;
use Source\Model\Notification;
use Source\Model\User;
use Source\Model\Role;

/**
 * Class Controller
 * @package Source\Main
 */
abstract class Controller
{
    /**
     * @var Engine
     */
    protected $view;

    /**
     * @var Router
     */
    protected $router;

    /**
     * @var object|null
     */
    protected $session_info;

    /**
     * Controller constructor.
     * @param $router
     */
    public function __construct($router)
    {
        /* Route */
        $this->router = $router;

        /* Plates */
        $this->view = Engine::create(dirname(__DIR__, 2) . '/views', "php");

        /* Session */
        if (!empty($_SESSION['user'])) {
            $this->session_info = (new User())->findById($_SESSION['user'])->data();
            $this->view->addData(["router" => $this->router, "access" => $this->session_info->access_id, "notifications" => (new Notification())->find("status = 'ativo'")->order("id DESC")->limit(5)->fetch(true) ]);
        } else {
            $this->view->addData(["router" => $this->router]);
        }
    }

    /**
     * @param string $param
     * @param array $values
     * @return string
     */
    public function ajaxResponse(string $param, array $values): string
    {
        return json_encode([$param => $values]);
    }

    /**
     * @param array $data
     */
    public function log(array $data)
    {
        $logData = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $log = new Log();

        $log->description = $logData['description'];
        $log->action = $logData['action'];

        if (!empty($logData['id'])) {
            $log->user_id = $logData['id'];
        } else {
            $log->user_id = $this->session_info->id;
        }

        $log->save();
    }

    public function generatePasswd($size, $uppercase = true, $lowercase = true, $number = true, $symbol = true)
    {
        $alphabetU = 'ABCDEFJHIJHLMNOPQRSTUVWXYZ';
        $alphabetL = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '1234567890';
        $symbols = '!@#$%&*()_+=';

        $passwd = '';

        if($uppercase) {
            $passwd .= str_shuffle($alphabetU);
        }

        if ($lowercase) {
            $passwd .= str_shuffle($alphabetL);
        }

        if ($number) {
            $passwd .= str_shuffle($numbers);
        }

        if ($symbol) {
            $passwd .= str_shuffle($symbols);
        }

        return substr(str_shuffle($passwd), 0, $size);
    }
}

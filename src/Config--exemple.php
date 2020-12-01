<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

/**
 * Name
 */
define("SITE", "E-Tecno");

/**
 * Local
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "DRIVER",
    "host" => "HOST",
    "port" => "PORT",
    "dbname" => "DBNAME",
    "username" => "DBUSER",
    "passwd" => "DBPASS",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/**
 * Url
 */
define("ROOT", "URL TO PROJECT");

/**
 * URL handling
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null)
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}

/**
 * Date treatment
 * @param string $date
 * @return false|string|string[]
 */
function dateformat(string $date)
{
    return str_replace("-", "/", date("d-m-Y H:i", strtotime($date)));
}
